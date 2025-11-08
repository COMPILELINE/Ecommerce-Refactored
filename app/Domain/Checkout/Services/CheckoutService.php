
<?php
namespace App\Domain\Checkout\Services;

use CodeIgniter\Database\ConnectionInterface;
use App\Domain\Cart\Repositories\CartRepository;
use App\Domain\Catalog\Repositories\ProductRepository;

final class CheckoutService
{
    public function __construct(
        private ConnectionInterface $db,
        private CartRepository $carts,
        private ProductRepository $products
    ){}

    public function placeOrder(int $userId): array
    {
        $this->db->transStart();

        $cartItems = $this->carts->items($userId);
        if (!$cartItems) {
            return ['success' => false, 'message' => 'Cart is empty'];
        }

        $total = 0;
        $itemsPrepared = [];
        foreach ($cartItems as $ci) {
            $p = $this->products->findById((int)$ci['product_id']);
            if (!$p || $p->stock < $ci['qty']) {
                $this->db->transRollback();
                return ['success' => false, 'message' => 'Out of stock'];
            }
            $lineTotal = $p->priceCents * (int)$ci['qty'];
            $total += $lineTotal;
            $itemsPrepared[] = ['product_id' => $p->id, 'qty' => (int)$ci['qty'], 'price_cents' => $p->priceCents, 'line_total_cents' => $lineTotal];
            // reserve stock
            $this->db->table('products')->where('id', $p->id)->set('stock', 'stock - '.$ci['qty'], false)->update();
        }

        $this->db->table('orders')->insert([
            'user_id' => $userId,
            'total_cents' => $total,
            'status' => 'placed',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $orderId = (int)$this->db->insertID();

        foreach ($itemsPrepared as $i) {
            $this->db->table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $i['product_id'],
                'qty' => $i['qty'],
                'price_cents' => $i['price_cents'],
                'line_total_cents' => $i['line_total_cents'],
            ]);
        }

        $this->carts->clear($userId);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return ['success' => false, 'message' => 'Transaction failed'];
        }

        return ['success' => true, 'order_id' => $orderId];
    }
}
