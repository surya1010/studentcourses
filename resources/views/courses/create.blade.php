@extends('layouts.app')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Home</a></li >
                <li><a href="{{ url('/courses') }}">Courses</a></li >
                <li class="active">Tambah</li >
            </ul>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Courses</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="/courses">Kembali</a>
                </p>
                  {!! Form:: open([ 'url' => route('courses.store'), 'method' => 'post' , 'class' => 'form-horizontal']) !!}
                   @include('courses._form')
                  {!! Form:: close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection