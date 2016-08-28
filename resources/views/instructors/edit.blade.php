@extends('layouts.app')
@section('content') 
<div class="row" >
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href=" {{ url('/home') }} " > Dashboard</a></li >
            <li><a href=" {{ url('/instructors') }} " > Instructors</a></li >
            <li class="active"> Ubah Instructors</li >
        </ul >
        <div class="panel panel-default" >
        <div class="panel-heading" >
        <h2 class="panel-title" > Ubah Instructors</h2>
        </div>
        <div class=" panel-body" >
            {!! Form::model($instructor, ['url' => route('instructors.update' , $instructor->id),
            'method' => 'put' ,  'class' => 'form-horizontal' ]) !!}
            @include('instructors._form')
            {!! Form:: close() !!}
        </div>
        </div>
    </div>
</div>
@endsection