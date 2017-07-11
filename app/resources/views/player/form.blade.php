<div class="form-group row {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-6">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('surname') ? 'has-error' : ''}}">
    {!! Form::label('surname', 'Surname', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('club') ? 'has-error' : ''}}">
    {!! Form::label('club', 'Club', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::text('club', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('contact_number') ? 'has-error' : ''}}">
    {!! Form::label('contact_number', 'Contact Number', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-offset-4 col-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary btn-sm']) !!}
    </div>
</div>
