<?php

use Illuminate\Database\Seeder;

use App\Course;
use App\Instructor;
use App\Payment;

class CoursesTableSeeder extends Seeder
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
            //$instructors = DB::table('instructors')->pluck('id');
            //$payments = DB::table('payments')->pluck('id');

            Course::create([
                    'name'  =>  $faker->name,
                    'description'   =>  $faker->sentences($nb = 3, $asText = false),
                    'instructor_id' =>  $faker->numberBetween($min = 1, $max = 10),
                    'payment_id' =>  $faker->numberBetween($min = 1, $max = 10),
                ]);
        }

    }
}
