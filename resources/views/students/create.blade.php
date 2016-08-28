@extends('layouts.app')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Dashboard</a></li >
                <li><a href="{{ url('/students') }}">Students</a></li >
                <li class="active">Tambah</li >
            </ul>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Students</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="/students">Kembali</a>
                </p>
                  {!! Form:: open([ 'url' => route('students.store'), 'method' => 'post' , 'class' => 'form-horizontal']) !!}
                   @include('students._form')
                  {!! Form:: close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection