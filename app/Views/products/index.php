<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('about') ?>">About</a> |
        <a href="<?= base_url('products') ?>">Products</a>
    </nav>

    <h1><?= esc($title) ?></h1>

    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= esc($product['name']) ?> - ₱<?= esc($product['price']) ?>
                <a href="<?= base_url('products/' . $product['id']) ?>">View</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
