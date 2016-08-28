<?php

use Illuminate\Database\Seeder;

//use Faker\Factory as Faker;

use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       
        // Sample list
        $payment1 = Payment::create(['code'=>str_random(6),'amount'=>'3000', 'date'=>date("Y-m-d"), 'status'=>'done']);
        $payment2 = Payment::create(['code'=>str_random(6),'amount'=>'2000', 'date'=>date("Y-m-d"), 'status'=>'done']);
        $payment3 = Payment::create(['code'=>str_random(6),'amount'=>'1000', 'date'=>date("Y-m-d"), 'status'=>'done']);
    }
}
