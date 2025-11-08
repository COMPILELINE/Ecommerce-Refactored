
<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'user_id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true],
            'total_cents' => ['type'=>'INT','constraint'=>11, 'default'=>0],
            'status' => ['type'=>'VARCHAR','constraint'=>40, 'default'=>'placed'],
            'created_at' => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders', true);
    }
    public function down() { $this->forge->dropTable('orders', true); }
}
