@extends('layouts.app')
@section('content') 
<div class="row" >
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href=" {{ url('/home') }} " > Dashboard</a></li >
            <li><a href=" {{ url('/payments') }} " > Payments</a></li >
            <li class="active"> Ubah Payments</li >
        </ul >
        <div class="panel panel-default" >
        <div class="panel-heading" >
        <h2 class="panel-title" > Ubah Payments</h2>
        </div>
        <div class=" panel-body" >
            {!! Form::model($payment, ['url' => route('payments.update' , $payment->id),
            'method' => 'put' ,  'class' => 'form-horizontal' ]) !!}
            @include('payments._form')
            {!! Form:: close() !!}
        </div>
        </div>
    </div>
</div>
@endsection