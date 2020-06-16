
@extends('layouts/admin_app')

@section('content')

    {{ Form::open(['action' => 'LessonsController@store','files'=>'true']) }}
    <div class="form-group">
        <label for="title">Enter title</label>
        <input type="text" name="title" class="form-control" id="title">
    </div>



    <div class="form-group">
        <select name="course_id" class="browser-default custom-select">
            <option selected>Choose course</option>
            @foreach($courses as $course)
            <option value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="short_text">Enter text</label>
        <input type="text" name="short_text" class="form-control" id="short_text">

    </div>
    {{--<div class="form-group">
        <label for="position">Position</label>
        <input type="number" name="position" class="form-control" id="position">
    </div>--}}
   {{-- <div class="form-group">
        <label for="downloadable_files">Downloadable files</label>
        <input type="number" name="downloadable_files" class="form-control" id="price">
    </div>--}}

   {{-- <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" class="form-control" id="start_date">
    </div>--}}

    <div class="form-group">
        <select name="is_published" class="browser-default custom-select">
            <option selected>Choose status</option>
            <option value="1">Published</option>
            <option value="0">Not published</option>
        </select>
    </div>

    {{--<div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" name="photo" class="form-control-file" id="photo">
    </div>--}}
   {{-- <input type="file" class="form-control" name="downloadable_files" required>Downloadable files--}}

    <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}


   {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



    </form>--}}
@endsection
