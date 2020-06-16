

@extends('layouts/admin_app')

@section('content')

    {{ Form::open(['action' => ['UserController@update','id'=>$user->id]]) }}
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="name">Enter name</label>
        <input type="name" name="name" class="form-control" id="name">{{$user->name}}
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
    {{--<div class="form-group form-check">
        <input type="checkbox"  name="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>--}}
    <button type="submit" class="btn btn-primary">Edit</button>
    {{ Form::close() }}


    {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



     </form>--}}
@endsection
