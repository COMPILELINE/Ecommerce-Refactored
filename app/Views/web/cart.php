
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<h1>Your Cart</h1>
<?php if (empty($cart['items'])): ?>
  <p>Cart is empty.</p>
<?php else: ?>
  <table>
    <thead><tr><th>Item</th><th>Qty</th><th>Price</th><th>Total</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($cart['items'] as $i): ?>
      <tr>
        <td><?= esc($i['name']) ?></td>
        <td><?= esc($i['qty']) ?></td>
        <td>₹ <?= number_format($i['price_cents']/100, 2) ?></td>
        <td>₹ <?= number_format($i['line_total_cents']/100, 2) ?></td>
        <td>
          <form action="/cart/remove" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="item_id" value="<?= esc($i['id']) ?>">
            <button type="submit">Remove</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <p><strong>Grand Total:</strong> ₹ <?= number_format($cart['total_cents']/100, 2) ?></p>
  <form action="/checkout" method="post">
    <?= csrf_field() ?>
    <button type="submit">Place Order</button>
  </form>
<?php endif; ?>
<?= $this->endSection() ?>
