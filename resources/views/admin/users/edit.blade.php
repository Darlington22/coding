@extends('layouts.admin')

@section('content')
    <div class="col-sm-3">
        <img height="200" width="200" src="{{$user->photo ? $user->photo->file : "/images/placeholder-man.png"}}" alt="">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
            <fieldset>
                <legend>Edit User</legend>

                <div class="form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter full name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                    {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter email address']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                    {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:', ['class' => 'control-label']) !!}
                    {!! Form::file('photo_id', $value = null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Role', ['class' => 'control-label'] )  !!}
                    {!!  Form::select('role_id',$roles, null, ['class' => 'form-control' ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status', ['class' => 'control-label'] )  !!}
                    {!!  Form::select('is_active', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control' ]) !!}
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
                </div>
            </fieldset>
        {!! Form::close()  !!}
    </div>

    @include('admin.inc.form_errors')

@endsection