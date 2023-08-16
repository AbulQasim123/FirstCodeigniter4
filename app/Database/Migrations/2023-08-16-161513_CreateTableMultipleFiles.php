<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMultipleFiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'path' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('multiplefiles');
    }
    
    public function down()
    {
        $this->forge->dropTable('multiplefiles');
    }
}
