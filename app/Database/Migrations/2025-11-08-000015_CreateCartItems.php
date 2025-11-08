
<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'user_id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'product_id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'qty' => ['type'=>'INT','constraint'=>11,'default'=>1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id','product_id']);
        $this->forge->createTable('cart_items', true);
    }
    public function down() { $this->forge->dropTable('cart_items', true); }
}
