<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('amount', 'Amount', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('amount', null, ['class'=>'form-control']) !!}
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php /*
dd($instructor);
exit();*/
?>

<div class="form-group">
       {{ Form::label('date', 'Date',['class' => 'col-md-2 control-label']) }}
       <div class="col-md-4">

       
        {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        @if($errors->has('date'))
         <small> {{ $errors->first('date') }} </small>
        @endif
       </div>
</div>



<input type="hidden" name="userID" value="{{ Auth::user()->id }}">

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
