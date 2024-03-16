<?php
include("../vendor/autoload.php");

use Faker\Factory as Faker;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$faker = Faker::create();
$table = new UsersTable(new MySQL());
if ($table) {
    echo "Database connection opened.\n";
    for ($i = 0; $i < 10; $i++) {
        $data = [
            'name' => $faker->name,
            'age' => $faker->numberBetween(18, 60), // Assuming you want to generate random ages between 18 and 60
            'photo' => $faker->imageUrl(200, 200), // Generate a random image URL with 200x200 dimensions
            'gender' => $faker->randomElement(['Male', 'Female', 'Others']), // Randomly select gender from the given options
            'address' => $faker->address,
            'class_id' => $faker->numberBetween(1, 4), // Assuming you want to generate random class IDs
            'subject_id' => $faker->numberBetween(1, 4), // Assuming you want to generate random subject IDs
            'role_id' => 1,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'password' => md5('password'),
            'suspended' => $faker->numberBetween(0, 1), // Assuming you want to randomly suspend some users
            'created_at' => date('Y-m-d H:i:s'), // Assuming you want to use the current date and time
            'updated_at' => date('Y-m-d H:i:s') // Assuming you want to use the current date and time
        ];
        $table->insert($data);
    }
    echo "Done populating users table.\n";
}
