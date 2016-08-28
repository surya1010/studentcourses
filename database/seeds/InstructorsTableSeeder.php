<?php

use Illuminate\Database\Seeder;

use App\Instructor;
class InstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) {
            Instructor::create([
                    "name"  =>  $faker->name,
                    "gender"  =>  $faker->randomElement(['Male','Female']),
                ]);
           
        }
    }
}
