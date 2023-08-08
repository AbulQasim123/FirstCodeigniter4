<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrudApi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 55,
                'null'           => true
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 55,
                'null'           => true
            ],
            'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'null'           => true
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
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['email', 'phone']);
        $this->forge->createTable('crudapis');
    }


    public function down()
    {
        $this->forge->dropTable('crudapis');
    }
}
