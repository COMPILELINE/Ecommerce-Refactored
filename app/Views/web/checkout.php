
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<h1>Checkout</h1>
<?php if (empty($cart['items'])): ?>
  <p>Your cart is empty.</p>
<?php else: ?>
  <p>Review your order and confirm.</p>
  <p><strong>Total:</strong> ₹ <?= number_format($cart['total_cents']/100, 2) ?></p>
  <form action="/checkout" method="post">
    <?= csrf_field() ?>
    <button type="submit">Confirm Order</button>
  </form>
<?php endif; ?>
<?= $this->endSection() ?>
