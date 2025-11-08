
<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insertBatch([
            ['name'=>'Demo User','email'=>'user@example.com','password_hash'=>password_hash('password', PASSWORD_DEFAULT),'is_admin'=>0],
            ['name'=>'Admin','email'=>'admin@example.com','password_hash'=>password_hash('password', PASSWORD_DEFAULT),'is_admin'=>1],
        ]);
    }
}
