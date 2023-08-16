<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthLogin extends Migration
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
                'constraint' => '120',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => true,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => true,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'editor'],
                'default' => 'editor',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
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
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('authlogins');
    }

    public function down()
    {
        $this->forge->dropTable('authlogins');
    }
}
