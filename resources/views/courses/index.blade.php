@extends('layouts.app')

@section('content')


    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Home</a></li >
                <li class="active">Course</li >
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Course</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="{{ url('/courses/create') }}">Tambah</a>
                </p>
                
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Instructor</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($courses as $std)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $std->name }} </td>
                                <td>{{ $std->instructor->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('courses/'.$std->id.'/edit') }}">Edit</a>
                                    <!-- <a class="btn btn-danger" href="{{ URL::to('students', $std->id) }}">Hapus</a> -->
                                    <div style="display:inline-block"> 
                                    {!! Form::open(array('url' => 'courses/' . $std->id, 'class' => '')) !!}
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