@extends('layouts.admin')

@section('content')
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'class'=>'form-horizontal', 'files'=>true]) !!}
        <fieldset>
            <legend>Create Post</legend>

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                {!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                {{ $errors->first('title', ':message') }}
            </div>

            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                {!! Form::label('category_id', 'Category:', ['class' => 'control-label']) !!}
                {!! Form::select('category_id', [''=>'Choose option'] + $categories,null, ['class' => 'form-control']) !!}
                {{ $errors->first('category_id', ':message') }}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:', ['class'=>'control-label']) !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!! Form::label('body', 'Description:', ['class' => 'control-label']) !!}
                {!! Form::textarea('body', $value = null, ['class' => 'form-control', 'placeholder' => 'Write about the post', 'rows'=>7]) !!}
                {{ $errors->first('body', ':message') }}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
            </div>
        </fieldset>
    {!! Form::close() !!}
@endsection