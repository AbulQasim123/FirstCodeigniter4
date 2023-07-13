<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'       => 'John Doe',
                'email'      => 'johndoe@example.com',
                'phone_no'   =>  8345935934,
                'password'   =>  password_hash('password123',PASSWORD_DEFAULT),
                // 'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Jane Smith',
                'email'      => 'janesmith@example.com',
                'phone_no'   =>  8923653434,
                'password'   =>  password_hash('secret456',PASSWORD_DEFAULT),
                // 'created_at' => date('Y-m-d H:i:s'),
            ],
            // Add more data rows as needed
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
