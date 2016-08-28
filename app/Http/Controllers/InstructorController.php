<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Instructor;

use Session;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset($_GET['gender'])){
            $instructors = Instructor::where('gender', $_GET['gender'])->orderBy('id','desc')->get();
            
        }else{
            $instructors = Instructor::orderBy('id','desc')->get();
        }
        return view('instructors.index')->with(compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instructors.create');
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
                'gender' => 'required',

            ]);
        

        $instructor = new Instructor();
        $instructor->name = $request->name;
        $instructor->gender = $request->gender;
        $instructor->save();

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan instructor $instructor->name",
            ]);
        return redirect()->route('instructors.index');
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
        $instructor = Instructor::find($id);
        return view('instructors.show')->with(compact('instructor'));
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
        $instructor = Instructor::find($id);

        return view('instructors.edit')->with(compact('instructor'));
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

            ]);

        $instructor = Instructor::find($id);
        $instructor->name = $request->input('name');
        $instructor->gender = $request->input('gender');
        $instructor->save();

        Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil simpan instructor $instructor->name",
            ]);
        return redirect()->route('instructors.index');
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
        Instructor::destroy($id);
        //$instructor->delete();
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "instructor berhasil dihapus"
        ]);
        return redirect()->route('instructors.index');
    }
}
