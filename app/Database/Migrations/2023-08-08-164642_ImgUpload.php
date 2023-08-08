<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ImgUpload extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('imguploads');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('mobile');
    }

    public function down()
    {
        $this->forge->dropTable('imguploads');
    }
}
