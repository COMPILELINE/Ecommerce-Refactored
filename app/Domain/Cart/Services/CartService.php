
<?php
namespace App\Domain\Cart\Services;

use App\Domain\Catalog\Repositories\ProductRepository;
use App\Domain\Cart\Repositories\CartRepository;

final class CartService
{
    public function __construct(
        private ProductRepository $products,
        private CartRepository $carts
    ){}

    public function getCart(int $userId): array
    {
        $rows = $this->carts->items($userId);
        $items = [];
        $total = 0;
        foreach ($rows as $row) {
            $p = $this->products->findById((int)$row['product_id']);
            if (!$p) continue;
            $line = [
                'id' => (int)($row['id'] ?? 0),
                'product_id' => $p->id,
                'name' => $p->name,
                'price_cents' => $p->priceCents,
                'qty' => (int)$row['qty'],
                'line_total_cents' => $p->priceCents * (int)$row['qty'],
            ];
            $total += $line['line_total_cents'];
            $items[] = $line;
        }
        return ['items' => $items, 'total_cents' => $total];
    }

    public function addItem(int $userId, int $productId, int $qty): void
    {
        $this->carts->addItem($userId, $productId, $qty);
    }

    public function removeItem(int $userId, int $itemId): void
    {
        $this->carts->removeItem($userId, $itemId);
    }

}
