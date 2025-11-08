
<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i=1; $i<=12; $i++) {
            $data[] = [
                'name' => 'Product '.$i,
                'slug' => 'product-'.$i,
                'price_cents' => 1999 + ($i*100),
                'stock' => 10 + $i,
                'image' => null,
            ];
        }
        $this->db->table('products')->insertBatch($data);
    }
}
