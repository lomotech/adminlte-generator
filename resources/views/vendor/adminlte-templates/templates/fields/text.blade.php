<!-- {{ $fieldTitle }} Field -->
<div class="form-group col-sm-6">
@if($config->options->localized)
    @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}').':') !!}
@else
    @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}:') !!}
@endif
    @{!! Form::text('{{ $fieldName }}', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')@php if(isset($options)) { echo htmlspecialchars_decode($options); } @endphp]) !!}
    @@if ($errors->has('name'))
        <span class="error invalid-feedback">@{!! $errors->first('name') !!} </span>
    @@endif
</div>
