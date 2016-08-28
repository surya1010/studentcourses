<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;

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
            $students = Student::with('course')
                                    ->where('active', $_GET['status'])
                                    ->orderBy('id','desc')
                                    ->get();
            
        }else{
            $students = Student::with('course')
                                ->orderBy('id','desc')
                                ->get();
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
        return view('students.create');
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
                'active' => 'required',
                'email' => 'required|email|max:255|unique:students',

            ]);
        

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->gender = $request->gender;
        $student->active = $request->active;
        $student->save();

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
        $student = Student::find($id);

        return view('students.edit')->with(compact('student'));
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
                'active' => 'required',
                'email' => 'required|email|max:255',

            ]);

        $student = Student::find($id);
        if(!$request->input('password')){
            $password = $student->password;
        }else{
            $password = bcrypt($request->input('password'));
        }
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $password;
        $student->gender = $request->input('gender');
        $student->active = $request->input('active');
        $student->save();

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
        //$student->delete();
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "Student berhasil dihapus"
        ]);
        return redirect()->route('students.index');
    }
}
