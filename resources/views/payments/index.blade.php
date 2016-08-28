@extends('layouts.app')

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href=" {{ url('/home') }} ">Dashboard</a></li >
                <li class="active">Payments</li >
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Payments</h2>
                </div>
                <div class="panel-body">
                <p>
                    <a class="btn btn-primary" href="{{ url('/payments/create') }}">Tambah</a>
                </p>
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Code</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($payments as $std)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $std->code }} </td>
                                <td>{{ $std->amount }} </td>
                                <td>{{ $std->date }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ url('payments/'.$std->id.'/edit') }}">Edit</a>
                                    <!-- <a class="btn btn-danger" href="{{ URL::to('payments', $std->id) }}">Hapus</a> -->
                                    <div style="display:inline-block"> 
                                    {!! Form::open(array('url' => 'payments/' . $std->id, 'class' => '')) !!}
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