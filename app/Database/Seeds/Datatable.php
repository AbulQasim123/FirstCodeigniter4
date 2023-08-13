<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Datatable extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 10000; $i++) {
            $data[] = $this->generateDummyData();
        }
        $this->db->table('datatables')->insertBatch($data);
    }

    public function generateDummyData()
    {
        $faker = Factory::create();
        $createdDate = $faker->dateTimeBetween('-10 year', 'now')->format('Y-m-d H:i:s');
        $updatedDate = $faker->dateTimeBetween($createdDate, 'now')->format('Y-m-d H:i:s');

        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'mobile' => $faker->phoneNumber,
            'designation' => $faker->randomElement([
                "Wordpress Developer",
                "IOS Developer",
                "HR",
                "Designer",
                "PHP Developer",
                "Project Manager",
                "SEO",
                "Android Developer"
            ]),
            'gender' => $faker->randomElement(["Male", "Female", "Other"]),
            'status' => $faker->randomElement([0, 1]),
            'created_at' => $createdDate,
            'updated_at' => $updatedDate,
        ];
    }
}
