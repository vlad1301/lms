

@extends('layouts.admin_app')

@section('content')

    {{ Form::open(['action' => ['CourseController@update','id'=>$course->id]]) }}
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="title">Enter title</label>
        <input type="text" name="title" value="{{$course->title}}" class="form-control" id="name">
    </div>



    {{--<div class="form-group">
        <select name="teacher" class="browser-default custom-select">
            <option selected>Choose teacher</option>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>--}}

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description"  value="{{$course->description}}" class="form-control" id="description">

    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{$course->price}}" class="form-control" id="price">
    </div>

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" value="{{$course->start_date}}" class="form-control" id="start_date">
    </div>

    <div class="form-group">
        <select name="published" class="browser-default custom-select">
            <option  value="{{$course->is_published}}" selected>Choose status</option>
            <option value="1">Published</option>
            <option value="0">Not published</option>
        </select>
    </div>

    {{--<input type="file" class="form-control" name="course_photo" required>--}}

    <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}


    {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



     </form>--}}
@endsection
