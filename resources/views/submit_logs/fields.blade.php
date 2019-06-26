<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Sex Field -->
<div class="form-group col-sm-6">
    {!! Form::label('submit_sex', 'Submit Sex:') !!}
    {!! Form::text('submit_sex', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('submit_data', 'Submit Data:') !!}
    {!! Form::text('submit_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_status', 'Pay Status:') !!}
    {!! Form::text('pay_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Rec Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rec_name', 'Rec Name:') !!}
    {!! Form::text('rec_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('submitLogs.index') !!}" class="btn btn-default">Cancel</a>
</div>
