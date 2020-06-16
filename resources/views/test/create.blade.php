{{--<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>--}}
@extends('layouts/admin_app')

@section('content')



{{ Form::open(['action' => 'TestsController@store','files'=>'true']) }}
<div class="form-group">
    <label for="title">Enter title</label>
    <input type="text" name="title" class="form-control" id="title">
</div>

{{--<select name="course_id" id="course_id">

    @foreach( $courses as $course )

        <option value="{{ $course->id }}">{{ $course->title }}</option>
    @endforeach
</select>--}}

<div class="form-group">
    <label for="course_id">Enter course</label>
    <input type="text" name="course_name" class="form-control" id="course_name">
    <div id="suggesstion_box"></div>
</div>

<div class="form-group">

    <label for="lesson_id">Choose lesson</label>
    <input type="text" name="lesson_name" class="form-control" id="lesson_name">
    <div id="suggesstion_lesson"></div>

</div>

{{--<div class="container box">
    <div class="form-group">
        <input type="select" name="lesson_name" id="lesson_name" class="form-control input-lg"/>Choose lesson
        <div id="lesson_name">
        </div>
    </div>
</div>--}}

{{--<select name="lesson_id" id="lesson_id">
    <option>Choose lesson</option>
</select>--}}





<script>
    $(document).ready(function() {
        $("#course_name").keyup(function () {
            var query = $("#course_name").val();

            if (query != '') {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "POST",
                    url: '{{ route( 'lessons.courses' ) }}',
                    data: {query: query},
                    success: function (data) {
                        $('#suggesstion_box').fadeIn();
                        $('#suggesstion_box').html(data);
                    }
                });

                $('#suggesstion_box').on('click', 'li', function () {

                    $('#course_name').val($(this).text());
                    $('#suggesstion_box').fadeOut();

                });
            }
            /* });*/
        });

            $("#lesson_name").keyup(function (){
                var query1 = $("#lesson_name").val();

                if (query1 != '') {
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        type: "POST",
                        url: '{{ route( 'lessons.lessons' ) }}',
                        data: {query1: query1},
                        success: function (data1) {
                            $('#suggesstion_lesson').fadeIn();
                            $('#suggesstion_lesson').html(data1);
                        }
                    });

                    $("#suggesstion_lesson").on('click', 'li', function () {
                        $('#lesson_name').val($(this).text());
                        $('#suggesstion_lesson').fadeOut();

                    });

                }




        });
    });

</script>

    {{--$('#course_id').keyup(function(){
        /!*$("#lesson_id").remove();*!/
        //$("#lesson_id option").remove();
        /!* var lesson=$("#lesson option").val();
         alert(lesson)*!/
        var id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url : '{{ route( 'lessons.courses' ) }}',
            /!*url : '/getmsg',*!/

            data: {

                "id": id
            },
            type: 'POST',
            dataType: 'json',

            success: function( result )
            {

                $.each( result, function(v) {
                /!*$.each( result, function(k, v) {*!/
                    $('#lesson_id').append($({text:v}));
                    /!*$('#lesson_id').append($('<option>', {value:k, text:v}));*!/
                });
            },
            error: function()
            {
                //handle errors
                alert('error');
            }
        });

    });--}}







<div class="form-group">
    <label for="description">Enter description</label>
    <input type="text" name="description" class="form-control" id="description">

</div>


{{--<div class="form-group">
    <select name="lesson_id" class="browser-default custom-select">
        <option selected>{{$course->title}}</option>
        @foreach($courses as $course)
        @foreach($course->lesson as $lesson)

            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
            @endforeach
        @endforeach
    </select>
</div>--}}

{{--<div class="form-group">
    <select name="lesson_id" class="browser-default custom-select">
        <option selected>Choose lesson</option>
        @foreach($lessons as $lesson)
            <option value="{{$lesson->id}}">{{$lesson->title}}</option>
        @endforeach
    </select>
</div>--}}


{{-- <div class="form-group">
     <label for="title">Enter title</label>
     <input type="text" name="title" class="form-control" id="title">

 </div>--}}


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

{{--<div class="form-group">
    <select name="is_published" class="browser-default custom-select">
        <option selected>Choose status</option>
        <option value="1">Published</option>
        <option value="0">Not published</option>
    </select>
</div>--}}

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

