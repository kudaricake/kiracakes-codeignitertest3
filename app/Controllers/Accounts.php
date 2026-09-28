<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Accounts extends BaseController
{
    public function customers(): string
    {
        $model = new CustomerModel();
        return view('accounts/customers', ['title' => 'Customer Accounts', 'customers' => $model->findAll()]);
    }

    public function users(): string
    {
        $model = new UserModel();
        return view('accounts/users', ['title' => 'User Accounts', 'users' => $model->findAll()]);
    }

    public function newCustomer(): string
    {
        helper('form');
        if ($this->request->getMethod() === 'post' && $this->validate([
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|max_length[20]',
        ])) {
            (new CustomerModel())->insert([
                'full_name' => trim($this->request->getPost('full_name')),
                'email' => trim($this->request->getPost('email')),
                'phone' => trim((string) $this->request->getPost('phone')),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->to(base_url('accounts/customers'));
        }
        return view('accounts/customer_form', ['title' => 'Add Customer', 'customer' => null, 'validation' => $this->validator]);
    }

    public function editCustomer(int $id): string
    {
        helper('form');
        $model = new CustomerModel();
        $customer = $model->find($id);
        if ($customer === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found');
        }
        if ($this->request->getMethod() === 'post' && $this->validate([
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|max_length[20]',
        ])) {
            $model->update($id, [
                'full_name' => trim($this->request->getPost('full_name')),
                'email' => trim($this->request->getPost('email')),
                'phone' => trim((string) $this->request->getPost('phone')),
            ]);
            return redirect()->to(base_url('accounts/customers'));
        }
        return view('accounts/customer_form', ['title' => 'Edit Customer', 'customer' => $customer, 'validation' => $this->validator]);
    }

    public function newUser(): string
    {
        helper('form');
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|max_length[50]|regex_match[/^[A-Za-z0-9_-]+$/]|is_unique[users.username]',
            'full_name' => 'required|min_length[2]|max_length[100]',
        ])) {
            (new UserModel())->insert([
                'username' => trim($this->request->getPost('username')),
                'full_name' => trim($this->request->getPost('full_name')),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->to(base_url('accounts/users'));
        }
        return view('accounts/user_form', ['title' => 'Add User', 'user' => null, 'validation' => $this->validator, 'uploadError' => null]);
    }

    public function editUser(int $id): string
    {
        helper('form');
        $model = new UserModel();
        $user = $model->find($id);
        if ($user === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }
        $uploadError = null;
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => "required|min_length[3]|max_length[50]|regex_match[/^[A-Za-z0-9_-]+$/]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[2]|max_length[100]',
        ])) {
            $data = ['username' => trim($this->request->getPost('username')), 'full_name' => trim($this->request->getPost('full_name'))];
            $file = $this->request->getFile('avatar');
            if ($file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE) {
                if (!$file->isValid()) {
                    $uploadError = $file->getErrorString();
                } elseif ($file->getSize() > 2 * 1024 * 1024) {
                    $uploadError = 'The avatar must not be larger than 2MB.';
                } elseif (!in_array($file->getMimeType(), ['image/jpeg', 'image/png'], true)) {
                    $uploadError = 'The avatar must be a JPG or PNG image.';
                } else {
                    $filename = $file->getRandomName();
                    service('image')->withFile($file->getTempName())->fit(300, 300, 'center')->save(FCPATH . 'uploads/' . $filename);
                    $data['avatar'] = $filename;
                }
            }
            if ($uploadError === null) {
                $model->update($id, $data);
                return redirect()->to(base_url('accounts/users'));
            }
        }
        return view('accounts/user_form', ['title' => 'Edit User', 'user' => $user, 'validation' => $this->validator, 'uploadError' => $uploadError]);
    }
}
