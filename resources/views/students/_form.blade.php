<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php 
if(isset($student)){

$dataID = array();
foreach ($student->konekCourse as $key => $value) {
    $dataID[] = $value->course_id  ;

}
}
// dd($dataAll);
// exit();
?>
<div class="form-group">
    {{ Form::label('email', 'Email',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        {{ Form::email('email', null, ['class' => 'form-control']) }}

        @if($errors->has('email'))
         <small> {{ $errors->first('email') }} </small>
        @endif
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        {!! Form::password('password', array('class' => 'form-control')) !!}

        @if($errors->has('password'))
         <small> {{ $errors->first('password') }} </small>
        @endif
    </div>
</div>

<div class="form-group">
    {{ Form::label('gender', 'Gender',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        @if(isset($student) && $student->gender)
        {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), $student->gender , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @else
        {!! Form::select('gender', array('Male' => 'Male', 'Female' => 'Female'), null , array('class' => 'form-control', 'placeholder'=>'Choose')) !!}
        @endif

        @if($errors->has('gender'))
         <small> {{ $errors->first('gender') }} </small>
        @endif
    </div>
</div>

<div class="form-group">
    {{ Form::label('course' , 'Course', ['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">


            

            @foreach($course as $cr)

            @if(isset($student))
                {!! Form::checkbox('course_id[]', $cr->id, in_array($cr->id, $dataID) , array('id'=>$cr->name)) !!}
                {{ Form::label($cr->name, $cr->name)}} <br>
            @else
                {!! Form::checkbox('course_id[]', $cr->id, null , array('id'=>$cr->name)) !!}
                {{ Form::label($cr->name, $cr->name)}} <br>
            @endif

            @endforeach
            
    </div>
</div>



<!-- <div class="form-group">
    {{ Form::label('active', 'Active',['class' => 'col-md-2 control-label']) }}
    <div class="col-md-4">
        {!! Form::select('active', array('Y' => 'Yes', 'T' => 'No'), null, ['class' => 'form-control']) !!}

        @if($errors->has('active'))
         <small> {{ $errors->first('active') }} </small>
        @endif
    </div>
</div> -->



<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
