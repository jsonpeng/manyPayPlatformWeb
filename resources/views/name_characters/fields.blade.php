<!-- Name Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_id', 'Name Id:') !!}
    {!! Form::text('name_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Character Field -->
<div class="form-group col-sm-6">
    {!! Form::label('character', 'Character:') !!}
    {!! Form::text('character', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nameCharacters.index') !!}" class="btn btn-default">Cancel</a>
</div>
