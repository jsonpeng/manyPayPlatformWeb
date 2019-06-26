<!-- Type Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', '类型:') !!}
   	<select name="type" class="form-control">
   		<option value="姓氏" @if(!empty($nameSet) && $nameSet->type == '姓氏') selected="selected" @endif>姓氏</option>
   		<option value="男生名字" @if(!empty($nameSet) && $nameSet->type == '男生名字') selected="selected" @endif>男生名字</option>
   		<option value="女生名字" @if(!empty($nameSet) && $nameSet->type == '女生名字') selected="selected" @endif>女生名字</option>
   	</select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', '名称:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12" >
	{!! Form::label('character', '请至少选择三个匹配性格:') !!}
	<div class="row">
        @foreach ($characters as $character)
            <div class="col-sm-2">
                <label>
             {!! Form::checkbox('character[]', $character, in_array($character, $selectedCharacters)) !!}
                    {!! $character !!}
                </label></br>
            </div>
        @endforeach
	</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary','disabled'=>'disabled']) !!}
    <a href="{!! route('nameSets.index') !!}" class="btn btn-default">返回</a>
</div>
