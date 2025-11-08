
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Shop') ?></title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
  <header><a href="/">My Shop</a> | <a href="/cart">Cart</a></header>
  <main><?= $this->renderSection('content') ?></main>
  <footer>&copy; <?= date('Y') ?></footer>
</body>
</html>
