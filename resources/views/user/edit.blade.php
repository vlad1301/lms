

@extends('layouts/admin_app')

@section('content')

    {{ Form::open(['action' => ['UserController@update','id'=>$user->id],'files'=>'true']) }}
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="name">Enter name</label>
        <input type="name" name="name" value="{{$user->name}}" class="form-control" id="name">{{$user->name}}
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <select name="role" class="browser-default custom-select">
            <option value="1" selected>Choose role</option>
            <option value="2">Admin</option>
            <option value="3">Teacher</option>
            <option value="4">Student</option>
        </select>
    </div>
    <input type="file" class="form-control" name="photo" >
    <button type="submit" class="btn btn-primary">Edit</button>
    {{ Form::close() }}


    {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



     </form>--}}
@endsection
