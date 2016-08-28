@extends('layouts.app')
@section('content') 
<div class="row" >
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href=" {{ url('/home') }} " > Dashboard</a></li >
            <li><a href=" {{ url('/students') }} " > Students</a></li >
            <li class="active"> Ubah Students</li >
        </ul >
        <div class="panel panel-default" >
        <div class="panel-heading" >
        <h2 class="panel-title" > Ubah Students</h2>
        </div>
        <div class=" panel-body" >
            {!! Form::model($student, ['url' => route('students.update' , $student->id),
            'method' => 'put' ,  'class' => 'form-horizontal' ]) !!}
            @include('students._form')
            {!! Form:: close() !!}
        </div>
        </div>
    </div>
</div>
@endsection