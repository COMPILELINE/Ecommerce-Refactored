
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<h1>Latest Products</h1>
<div class="grid">
<?php foreach ($products as $p): ?>
  <div class="card">
    <a href="/product/<?= esc($p->slug) ?>">
      <img src="<?= esc($p->image ?? '/assets/placeholder.png') ?>" alt="<?= esc($p->name) ?>" width="160">
      <h3><?= esc($p->name) ?></h3>
      <p>₹ <?= number_format($p->priceCents/100, 2) ?></p>
    </a>
    <form action="/cart/add" method="post">
      <?= csrf_field() ?>
      <input type="hidden" name="product_id" value="<?= esc($p->id) ?>">
      <input type="number" name="qty" value="1" min="1">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>
