
<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'order_id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'product_id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'qty' => ['type'=>'INT','constraint'=>11,'default'=>1],
            'price_cents' => ['type'=>'INT','constraint'=>11,'default'=>0],
            'line_total_cents' => ['type'=>'INT','constraint'=>11,'default'=>0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('order_id');
        $this->forge->createTable('order_items', true);
    }
    public function down() { $this->forge->dropTable('order_items', true); }
}
