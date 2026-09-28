<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title><?= esc($title) ?></title></head><body>
<h1><?= esc($title) ?></h1><p><a href="<?= base_url('users/new') ?>">Add New User</a></p>
<table border="1" cellpadding="6"><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Created At</th><th>Action</th></tr>
<?php foreach ($users as $user): ?><tr><td><img src="<?= base_url('uploads/' . ($user['avatar'] ?: 'placeholder.svg')) ?>" alt="Avatar" width="80" height="80"></td><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['created_at']) ?></td><td><a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td></tr><?php endforeach; ?></table>
</body></html>
