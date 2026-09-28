<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index(): string
    {
        // Temporary data source until a database and model are introduced.
        $products = [
            ['id' => 1, 'name' => 'Notebook', 'price' => 50],
            ['id' => 2, 'name' => 'Backpack', 'price' => 850],
            ['id' => 3, 'name' => 'Ballpen Set', 'price' => 120],
        ];

        return view('products/index', [
            'title' => 'Product Listing',
            'products' => $products,
        ]);
    }

    public function show(int $id): string
    {
        $products = [
            ['id' => 1, 'name' => 'Notebook', 'price' => 50],
            ['id' => 2, 'name' => 'Backpack', 'price' => 850],
            ['id' => 3, 'name' => 'Ballpen Set', 'price' => 120],
        ];

        foreach ($products as $product) {
            if ($product['id'] === $id) {
                return view('products/show', [
                    'title' => 'Product Details',
                    'product' => $product,
                ]);
            }
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
    }
}
