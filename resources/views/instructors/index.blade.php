@extends('layouts.app')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Dashboard</a></li >
                <li class="active">Instructors</li >
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Instructors</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="{{ url('/instructors/create') }}">Tambah</a>
                </p>

                <div class="pull-right">
                <!--OPEN FORM-->
               {!! Form::open(array('url' => 'instructors/', 'method'=>'GET', 'class' => 'form-inline')) !!}

                {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), null , array('class' => 'form-control', 'placeholder'=>'Choose Gender')) !!}


                {{Form::submit('Cari', array('class' => 'btn btn-info')) }}

               {!! Form::close() !!}
               <!--close form-->
                </div>
                <div class="clearfix"></div>
                <p></p>
                    Total : {{ $instructors->count() }}
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($instructors as $std)
                        
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $std->name }} </td>
                                <td>{{ $std->gender }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('instructors/'.$std->id.'/edit') }}">Edit</a>
                                    <!-- <a class="btn btn-danger" href="{{ URL::to('instructors', $std->id) }}">Hapus</a> -->
                                    <div style="display:inline-block"> 
                                    {!! Form::open(array('url' => 'instructors/' . $std->id, 'class' => '')) !!}
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