

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<a href="http://learn.jquery.com">Learn jQuery</a>


</body>
<script>

    $( "a" ).trigger( "click" );


    /*var headings=$("h1");
    console.log(headings.length);*/

    /*var headings=$("h1")[0].innerHTML ;
    console.log(headings);*/

    /*var firstHeadings=headings.eq(1).html();
    console.log(firstHeadings);*/
/*
    console.log(headings.length);
*/

</script>

</html>










{{--


@extends('layouts.admin_app')

@section('content')







    <a class="btn btn-info" href="{{route('tests.trashed')}}">Trash </a>
    <div class="table-responsive">
    <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>
                <th scope="col">Lesson</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>


            </tr>
            </thead>

            <tbody>
            @foreach($tests as $test)
            <tr>
                <th scope="row">1</th>
                <td>{{$test->course->title}}</td>
                <td>{{$test->lesson->title}}</td>
                <td>{{$test->title}}</td>
                <td>{{$test->description}}</td>
                <td><form action="{{ route('tests.destroy',$test->id) }}" method="POST">
                <a class="btn btn-primary" href="{{route('tests.edit',$test->id)}}">Edit</a>
                <a class="btn btn-info" href="{{ route('tests.show',$test->id) }}">Show</a>

                   --}}
{{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>--}}{{--


                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>


            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
--}}
