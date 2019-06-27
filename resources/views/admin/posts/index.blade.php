@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <div class="col-sm-12">

        @if(session()->get('create_post'))
            <div class="alert alert-success">
                {{ session()->get('create_post') }}
            </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50" src="{{$post->photo->file}}" alt=""></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection