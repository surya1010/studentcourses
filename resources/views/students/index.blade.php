@extends('layouts.app')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Dashboard</a></li >
                <li class="active">Students</li >
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Students</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="{{ url('/students/create') }}">Tambah</a>
                </p>

                @if(isset($_GET['status']) && $_GET['status']!=="")
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ url('/students') }}">Reset</a>
                </div>
                @endif
                
                <div class="pull-right">
                
                 <!--OPEN FORM-->
               {!! Form::open(array('url' => 'students/', 'method'=>'GET', 'class' => 'form-inline')) !!}

                {!! Form::select('status', array('T' => 'Unactived', 'Y' => 'Active'), null , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}


                {{Form::submit('Cari', array('class' => 'btn btn-info')) }}
                
               {!! Form::close() !!}
               <!--close form-->
                </div>
                <div class="clearfix"></div>
                <p></p>
                
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Active</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($students as $std)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $std->name }} </td>
                                <td>{{ $std->email }}</td>
                                <td>{{ $std->gender }}</td>
                                <td>
                                        @if($std->konekCourse->count() > 0)
                                            <ul>
                                            @foreach($std->konekCourse as $crs)
                                                <li>{{ $crs->course->name }}</li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    
                                </td>
                                <td>{{ $std->active }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('students/'.$std->id.'/edit') }}">Edit</a>
                                    <!-- <a class="btn btn-danger" href="{{ URL::to('students', $std->id) }}">Hapus</a> -->
                                    <div style="display:inline-block"> 
                                    {!! Form::open(array('url' => 'students/' . $std->id, 'class' => '')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('Hapus', array('class' => 'btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection