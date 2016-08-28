<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php /*
dd($instructor);
exit();*/
?>



<div class="form-group">
    {{ Form::label('gender', 'Gender',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        @if(isset($instructor) && $instructor->gender)
        {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), $instructor->gender , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @else
        {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), null , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @endif

        @if($errors->has('gender'))
         <small> {{ $errors->first('gender') }} </small>
        @endif
    </div>
</div>



<input type="hidden" name="userID" value="{{ Auth::user()->id }}">

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
