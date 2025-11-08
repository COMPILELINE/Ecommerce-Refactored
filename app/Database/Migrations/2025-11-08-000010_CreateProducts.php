
<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'name' => ['type'=>'VARCHAR','constraint'=>180],
            'slug' => ['type'=>'VARCHAR','constraint'=>190, 'unique'=>true],
            'price_cents' => ['type'=>'INT','constraint'=>11,'default'=>0],
            'stock' => ['type'=>'INT','constraint'=>11,'default'=>0],
            'image' => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'created_at' => ['type'=>'DATETIME','null'=>true],
            'updated_at' => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products', true);
    }
    public function down() { $this->forge->dropTable('products', true); }
}
