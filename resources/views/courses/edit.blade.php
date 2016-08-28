@extends('layouts.app')
@section('content') 
<div class="row" >
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href=" {{ url('/home') }} " > Home</a></li >
            <li><a href=" {{ url('/courses') }} " > Courses</a></li >
            <li class="active"> Ubah Courses</li >
        </ul >
        <div class="panel panel-default" >
        <div class="panel-heading" >
        <h2 class="panel-title" > Ubah Courses</h2>
        </div>
        <div class=" panel-body" >
            {!! Form::model($course, ['url' => route('courses.update' , $course->id),
            'method' => 'put' ,  'class' => 'form-horizontal' ]) !!}
            @include('courses._form')
            {!! Form:: close() !!}
        </div>
        </div>
    </div>
</div>
@endsection