<?php

use Illuminate\Database\Seeder;

use App\Payment;
use App\Student;
use App\Instructor;
use App\Course;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         //$this->call(PaymentsTableSeeder::class);
         //$this->call(InstructorsTableSeeder::class);
         //$this->call(CoursesTableSeeder::class);
         //$this->call(StudentsTableSeeder::class);

        $payment1 = Payment::create(['code'=>str_random(6),'amount'=>'3000', 'date'=>date("Y-m-d"), 'status'=>'done']);
        $payment2 = Payment::create(['code'=>str_random(6),'amount'=>'2000', 'date'=>date("Y-m-d"), 'status'=>'done']);
        $payment3 = Payment::create(['code'=>str_random(6),'amount'=>'1000', 'date'=>date("Y-m-d"), 'status'=>'done']);

        $student1 = Student::create(['name'=>'Surya Lampura', 'email'=>'rawrsurya@surya.com', 'password'=>bcrypt('surya123'),'gender'=>'Male','active'=>'Y']);
        $student2 = Student::create(['name'=>'Christy Meilinda', 'email'=>'christy@christy.com', 'password'=>bcrypt('christy123'),'gender'=>'Female','active'=>'Y']);
        $student3 = Student::create(['name'=>'Dimas', 'email'=>'dimas@dimas.com', 'password'=>bcrypt('dimas123'),'gender'=>'Male','active'=>'Y']);

        $instruktur1 = Instructor::create(['name'=>'Agus Salim', 'gender'=>'Male']);
        $instruktur2 = Instructor::create(['name'=>'Ari Hidayat', 'gender'=>'Male']);
        $instruktur3 = Instructor::create(['name'=>'Epoy','gender'=>'Male']);


        $course1 = Course::create(['instructor_id'=>$instruktur1->id, 'payment_id'=>$payment1->id, 'student_id'=>$student1->id, 'name'=>'Fisika','description'=>'Belajar Fisika']);
        $course2 = Course::create(['instructor_id'=>$instruktur2->id, 'payment_id'=>$payment2->id, 'student_id'=>$student1->id, 'name'=>'Matematika','description'=>'Belajar Matematika']);
        $course3 = Course::create(['instructor_id'=>$instruktur3->id, 'payment_id'=>$payment3->id, 'student_id'=>$student2->id, 'name'=>'Coding','description'=>' Belajar Coding']);
        
       


        
    }
}
