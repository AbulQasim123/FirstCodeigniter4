<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatatableMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
                'null' => false
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => false
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['Male', 'Female','Other'],
                'null' => false
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datatables');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('mobile');
    }

    public function down()
    {
        $this->forge->dropTable('datatables');
    }
}
