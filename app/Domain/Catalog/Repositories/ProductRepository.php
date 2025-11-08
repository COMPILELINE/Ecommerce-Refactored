
<?php
namespace App\Domain\Catalog\Repositories;

use App\Domain\Catalog\Entities\Product;
use CodeIgniter\Database\ConnectionInterface;

final class ProductRepository
{
    public function __construct(private ConnectionInterface $db) {}

    public function latest(int $limit = 12): array
    {
        $rows = $this->db->table('products')->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
        return array_map([$this,'map'], $rows);
    }

    public function findBySlug(string $slug): ?Product
    {
        $row = $this->db->table('products')->where('slug', $slug)->get()->getRowArray();
        return $row ? $this->map($row) : null;
    }

    public function findById(int $id): ?Product
    {
        $row = $this->db->table('products')->where('id', $id)->get()->getRowArray();
        return $row ? $this->map($row) : null;
    }

    private function map(array $r): Product
    {
        return new Product((int)$r['id'], $r['name'], $r['slug'], (int)$r['price_cents'], (int)$r['stock'], $r['image'] ?? null);
    }
}
