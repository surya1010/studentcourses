<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group">
    {{ Form::label('instructor_id', 'Instructor',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        @if(isset($instructor) && $instructor->instructor_id)
        {!! Form::select('instructor_id', App\Instructor::pluck('name','id')->all(), $instructor->instructor_id , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @else
        {!! Form::select('instructor_id', App\Instructor::pluck('name','id')->all(), null , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @endif

        @if($errors->has('instructor_id'))
         <small> {{ $errors->first('instructor_id') }} </small>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
