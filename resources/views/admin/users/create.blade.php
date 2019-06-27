@extends('layouts.admin')

@section('content')
    {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

    <fieldset>
        <legend>Create User</legend>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter full name']) !!}
            {{ $errors->first('name', ':message') }}
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter email address']) !!}
            {{ $errors->first('email', ':message') }}
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
            {{ $errors->first('password', ':message') }}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:', ['class' => 'control-label']) !!}
            {!! Form::file('photo_id', $value = null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
            {!! Form::label('role_id', 'Role', ['class' => 'control-label'] )  !!}
            {!!  Form::select('role_id', ['' => 'Choose option'] + $roles, null, ['class' => 'form-control' ]) !!}
            {{ $errors->first('role_id', ':message') }}
        </div>

        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
            {!! Form::label('is_active', 'Status', ['class' => 'control-label'] )  !!}
            {!!  Form::select('is_active', ['' => 'Status', 1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control' ]) !!}
            {{ $errors->first('is_active', ':message') }}
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
        </div>

    </fieldset>

    {!! Form::close()  !!}

    @include('admin.inc.form_errors')

@endsection