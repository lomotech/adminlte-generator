<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}
    @if ($errors->has('name'))
        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}
    @if ($errors->has('email'))
        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
</div>

<!-- password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}
    @if ($errors->has('password'))
        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
    @endif
</div>

<!-- password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Password Confirmation:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control'. ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required']) !!}
    @if ($errors->has('password_confirmation'))
        <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
    @endif
</div>
