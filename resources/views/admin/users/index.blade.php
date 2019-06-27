@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <div class="col-sm-12">

        @if(session()->get('deleted_user'))
            <div class="alert alert-success">
                {{ session()->get('deleted_user') }}
            </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height="50" src="{{$user->photo ? $user->photo->file : "/images/placeholder-man.png"}}" alt=""></td>
                        <td><a href="{{route('users.edit', ['id'=>$user->id])}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
