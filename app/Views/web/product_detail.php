
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<article>
  <h1><?= esc($product->name) ?></h1>
  <img src="<?= esc($product->image ?? '/assets/placeholder.png') ?>" width="240">
  <p>Price: ₹ <?= number_format($product->priceCents/100, 2) ?></p>
  <form action="/cart/add" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="product_id" value="<?= esc($product->id) ?>">
    <input type="number" name="qty" value="1" min="1">
    <button type="submit">Add to Cart</button>
  </form>
</article>
<?= $this->endSection() ?>
