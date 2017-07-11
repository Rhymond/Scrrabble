<div class="form-group row {{ $errors->has('winner_id') ? 'has-error' : ''}}">
    {!! Form::label('winner_id', 'Winner', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-6">
        {!! Form::select('winner_id', $players, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('looser_id') ? 'has-error' : ''}}">
    {!! Form::label('looser_id', 'Looser', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-6">
        {!! Form::select('looser_id', $players, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('winner_score') ? 'has-error' : ''}}">
    {!! Form::label('winner_score', 'Winner Score', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::number('winner_score', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row {{ $errors->has('looser_score') ? 'has-error' : ''}}">
    {!! Form::label('looser_score', 'Looser Score', ['class' => 'col-4 control-label']) !!}
    <div class="col-6">
        {!! Form::number('looser_score', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-offset-4 col-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary btn-sm']) !!}
    </div>
</div>
