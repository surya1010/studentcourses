<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Instructor;

use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::with('instructor')->orderBy('id','desc')->get();
        //$instructor = Course::with('instructor');
        return view('courses.index')->with(compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('courses.create');
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
                'instructor_id' => 'required',

            ]);
        
        $course = Course::create($request->all());

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan course $course->name",
            ]);
        return redirect()->route('courses.index');
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
        $course = Course::find($id);

        return view('courses.edit')->with(compact('course'));
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
                'instructor_id' => 'required',

            ]);
        
        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->instructor_id = $request->input('instructor_id');
        $course->description = $request->input('description');
        $course->save();
        //$course = update($request->all());

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan course $course->name",
            ]);
        return redirect()->route('courses.index');
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
        Course::destroy($id);
        //$student->delete();
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "Course berhasil dihapus"
        ]);
        return redirect()->route('courses.index');
    }

   /* public function getIntructor($instructor_id)
    {
        $instructor = Instructor::where('name', $instructor_id)->first();
        return $instructor;
    }*/
}
