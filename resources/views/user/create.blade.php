

@extends('layouts/admin_app')

@section('content')

    {{ Form::open(['action' => 'UserController@store','files'=>'true']) }}
    <div class="form-group">
        <label for="name">Enter name</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
    <select name="role" class="browser-default custom-select">
        <option value="1" selected>Choose role</option>
        <option value="2">Admin</option>
        <option value="3">Teacher</option>
        <option value="4">Student</option>
    </select>
    </div>
    {{--<div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" name="photo" class="form-control-file" id="photo">
    </div>--}}
    <input type="file" class="form-control" name="photo" required>

    <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}


   {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



    </form>--}}
@endsection
