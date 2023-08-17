<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
class LoadMoreSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100 ; $i++) { 
            $this->db->table('loadmores')->insert($this->generateData());
        }
    }

    public function generateData() {
        $faker = Factory::create();
        return [
            'name' => $faker->name,
            'description' => $faker->sentence(6),
        ];
    }
}
