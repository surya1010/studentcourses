<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\KoneksiCourse;
use App\Course;

use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset($_GET['status'])){
            $students = Student::with('konekCourse')->where('active', $_GET['status'])
                                    ->orderBy('id','desc')
                                    ->get();
            
        }else{
            $students = Student::with('konekCourse')->orderBy('id','desc')
                                ->get();
            //$koneksi = KoneksiCourse::where('student_id', $students->id);
        }
        return view('students.index')->with(compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $course = Course::orderBy('id', 'desc')->get();
        return view('students.create')->with(compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
                'name' => 'required',
                'password' => 'required|min:6',
                'gender' => 'required',
                //'active' => 'required',
                'email' => 'required|email|max:255|unique:students',

            ]);
        

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->gender = $request->gender;
        $student->active = 'T';
        //$student->course_id = 1;
       // $student->save();

        if($student->save())
        {
            $studentlastID = $student->id;

            $jumlah = count($request->course_id);
            for ($i=0; $i < $jumlah; $i++) { 
                $course_idX = $request->course_id[$i];

                $newCOurse = new KoneksiCourse();
                $newCOurse->course_id = $course_idX;
                $newCOurse->student_id = $studentlastID;
                $newCOurse->save();
            }


        }

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan student $student->name",
            ]);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::find($id);
        return view('students.show')->with(compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::orderBy('id', 'desc')->get();
        $student = Student::with('konekCourse')->find($id);

        return view('students.edit')->with(compact('student', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'name' => 'required',
                'gender' => 'required',
                //'active' => 'required',
                'email' => 'required|email|max:255',

            ]);
        if(isset($request))
        {


            $student = Student::find($id);
            //dd($student->id);
            if(!$request->input('password')){
                $password = $student->password;
            }else{
                $password = bcrypt($request->input('password'));
            }
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->password = $password;
            $student->gender = $request->input('gender');
            $student->active = 'T';
            $student->save();



                //Cek student_id apa ada dikoneksi
                $cekIDstudent = KoneksiCourse::where('student_id',  $student->id)->first();
                if($cekIDstudent){

                    $deletekoneksi = KoneksiCourse::where('student_id',  $student->id);
                    //dd($deletekoneksi);

                    if($deletekoneksi->delete())
                    {
                        $jumlah = count($request->course_id);
                            for ($i=0; $i < $jumlah; $i++) { 
                                $course_idX = $request->course_id[$i];

                                $newCOurse = new KoneksiCourse();
                                $newCOurse->course_id = $course_idX;
                                $newCOurse->student_id = $student->id;
                                $newCOurse->save();
                            }
                    }

                }else{
                    //Kalo student_id ga ada dikoneksi
                        $jumlah = count($request->course_id);
                            for ($i=0; $i < $jumlah; $i++) { 
                                $course_idX = $request->course_id[$i];

                                $newCOurse = new KoneksiCourse();
                                $newCOurse->course_id = $course_idX;
                                $newCOurse->student_id = $student->id;
                                $newCOurse->save();
                            }
                }

                
            
        

        }

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan student $student->name",
            ]);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Student::destroy($id);
        KoneksiCourse::destroy($id);
        //$deletekoneksi->delete()
        //$student->delete();
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "Student berhasil dihapus"
        ]);
        return redirect()->route('students.index');
    }

    
}
