
<?php
namespace App\Domain\Cart\Repositories;

use CodeIgniter\Database\ConnectionInterface;

final class CartRepository
{
    public function __construct(private ConnectionInterface $db) {}

    public function items(int $userId): array
    {
        $rows = $this->db->table('cart_items')->where('user_id', $userId)->get()->getResultArray();
        return $rows;
    }

    public function addItem(int $userId, int $productId, int $qty): void
    {
        $row = $this->db->table('cart_items')->where(['user_id' => $userId, 'product_id' => $productId])->get()->getRowArray();
        if ($row) {
            $this->db->table('cart_items')->where('id', $row['id'])->update(['qty' => $row['qty'] + $qty]);
        } else {
            $this->db->table('cart_items')->insert(['user_id' => $userId, 'product_id' => $productId, 'qty' => $qty]);
        }
    }

    public function removeItem(int $userId, int $itemId): void
    {
        $this->db->table('cart_items')->where(['user_id' => $userId, 'id' => $itemId])->delete();
    }

    public function clear(int $userId): void
    {
        $this->db->table('cart_items')->where('user_id', $userId)->delete();
    }
}
