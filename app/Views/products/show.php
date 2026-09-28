<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h1><?= esc($title) ?></h1>
    <h2><?= esc($product['name']) ?></h2>
    <p>Price: ₱<?= esc($product['price']) ?></p>
    <a href="<?= base_url('products') ?>">Back to Products</a>
</body>
</html>
