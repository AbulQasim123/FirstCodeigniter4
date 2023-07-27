<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
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
        'post_title' => [
            'type' => 'VARCHAR',
            'constraint' => 25
        ],
        'post_category' => [
            'type' => 'VARCHAR',
            'constraint' => 25
        ],
        'post_body' => [
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'post_image' => [
            'type' => 'VARCHAR',
            'constraint' => 255
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('posts');
}

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
