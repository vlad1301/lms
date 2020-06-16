{{--

--}}
{{--@extends('layouts.admin_app')

@section('content')--}}{{--

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


{{ Form::open(['action' => 'TestsController@store','files'=>'true']) }}
<div class="form-group">
    <label for="title">Enter title</label>
    <input type="text" name="title" class="form-control" id="title">
</div>



--}}
{{--<div class="form-group">
    <select name="course_id" class="browser-default custom-select">
        <option selected>Choose course</option>
        @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->title}}</option>

        @endforeach
    </select>
</div>--}}{{--



<select name="course" id="course">
    @foreach( $courses as $course )
        <option value="{{ $course->id }}">{{ $course->title }}</option>
    @endforeach
</select>
--}}
{{--<select name="lesson" id="lesson"></select>--}}{{--

<select name="lesson" id="lesson">
    <option></option>
</select>
<script>

    $('#course').change(function(){
        $("#lesson option").remove();
        /* var lesson=$("#lesson option").val();
         alert(lesson)*/
        var id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '{{ route( 'lessons.courses' ) }}',

            data: {
                /*"_token": "{{ csrf_token() }}",*/
                "id": id
            },
            type: 'post',
            dataType: 'json',

            success: function( result )
            {
                $.each( result, function(k, v) {
                    $('#lesson').append($('<option>', {value:k, text:v}));
                });
            },
            error: function()
            {
                //handle errors
                alert('error');
            }
        });

    });





</script>

<div class="form-group">
    <label for="description">Enter description</label>
    <input type="text" name="description" class="form-control" id="description">

</div>


--}}
{{--<div class="form-group">
    <select name="lesson_id" class="browser-default custom-select">
        <option selected>{{$course->title}}</option>
        @foreach($courses as $course)
        @foreach($course->lesson as $lesson)

            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
            @endforeach
        @endforeach
    </select>
</div>--}}{{--


--}}
{{--<div class="form-group">
    <select name="lesson_id" class="browser-default custom-select">
        <option selected>Choose lesson</option>
        @foreach($lessons as $lesson)
            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
        @endforeach
    </select>
</div>--}}{{--



--}}
{{-- <div class="form-group">
     <label for="title">Enter title</label>
     <input type="text" name="title" class="form-control" id="title">

 </div>--}}{{--



--}}
{{--<div class="form-group">
    <label for="position">Position</label>
    <input type="number" name="position" class="form-control" id="position">
</div>--}}{{--

--}}
{{-- <div class="form-group">
     <label for="downloadable_files">Downloadable files</label>
     <input type="number" name="downloadable_files" class="form-control" id="price">
 </div>--}}{{--


--}}
{{-- <div class="form-group">
     <label for="start_date">Start Date</label>
     <input type="date" name="start_date" class="form-control" id="start_date">
 </div>--}}{{--


--}}
{{--<div class="form-group">
    <select name="is_published" class="browser-default custom-select">
        <option selected>Choose status</option>
        <option value="1">Published</option>
        <option value="0">Not published</option>
    </select>
</div>--}}{{--


--}}
{{--<div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" name="photo" class="form-control-file" id="photo">
</div>--}}{{--

--}}
{{-- <input type="file" class="form-control" name="downloadable_files" required>Downloadable files--}}{{--


<button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}


--}}
{{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



 </form>--}}{{--

--}}
{{--@endsection--}}{{--


--}}
