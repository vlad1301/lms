

@extends('layouts/admin_app')

@section('content')

    {{ Form::open(['action' => 'QuestionController@store','files'=>'true']) }}
    <div class="form-group mt-2 col-md-12">
        <label for="question">Enter question</label>
        <input type="text" name="question" class="form-control" id="name" required>
    </div>

    {{--<input type="file" class="form-control" name="my_file" required>--}}
   {{-- {!! Form::file('question_photo'); !!}--}}

    {{--<div class="form-group">
        <label for="question_photo">Photo</label>
        <input type="file" name="question_photo" class="form-control-file" id="question_photo">
    </div>--}}
    <div class="form-group pb-5 col-md-6">

        <label for="score">Enter score</label>
        <input type="number" name="score" class="form-control" id="number" value="1">


    </div>

    @for($i=0;$i<4;$i++)
        <div class="form-group mt-2 col-md-8">
        <label for="question">Question option</label>
        <input type="text" name="option_text{{$i}}" class="form-control" id="name" >
        </div>

        <div class="form-group pb-5 col-md-8">

        <input class="form-check-input mt-2 col-md-8" type="checkbox" name="checkbox{{$i}}" value="1" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Correct
        </label>
        </div>

    @endfor

    <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}


   {{-- <form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">



    </form>--}}
@endsection
