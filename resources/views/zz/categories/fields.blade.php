<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}
    @if ($errors->has('name'))
        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    {!! Form::select('parent_id', \App\Models\Zz\Category::pluck('name','id')->toArray(), null, ['class' => 'form-control'. ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => __('crud.please_select')]) !!}
    @if ($errors->has('parent_id'))
        <span class="error invalid-feedback">{{ $errors->first('parent_id') }}</span>
    @endif
</div>
