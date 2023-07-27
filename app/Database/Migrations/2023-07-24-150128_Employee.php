<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'date_of_birth' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'mobile_no' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
            ],
            'designation' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => date('Y-m-d H:i:s'),
            ],
            
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => date('Y-m-d H:i:s'),
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
