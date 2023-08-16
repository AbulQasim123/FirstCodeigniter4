<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\AuthLoginModel;

class AuthLoginSeeder extends Seeder
{
    public function run()
    {
        $tbl_object = new AuthLoginModel();
        $tbl_object->insertBatch([
            [
                'name' => 'Rahul Sharma',
                'email' => 'rahul@gmail.com',
                'mobile' => '8596748512',
                'role' => 'admin',
                'password' => password_hash('password', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'Rohit Kumar',
                'email' => 'rohit@gmail.com',
                'mobile' => '8554625412',
                'role' => 'editor',
                'password' => password_hash('password', PASSWORD_DEFAULT),
            ]
        ]);
    }
}
