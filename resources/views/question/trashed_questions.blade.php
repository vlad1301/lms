

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('questions.index')}}">All Lessons </a>
    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Logo</th>

                <th scope="col">Teacher</th>

                <th scope="col">Description</th>
                <th scope="col">Position</th>
                <th scope="col">downloadable_files</th>
                {{-- <th scope="col">Number of students enrolled</th>--}}



            </tr>
            </thead>

            <tbody>
            @foreach($questions as $question)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$question->title}}</td>
                    <td><img src="{{$question->getFirstMediaUrl('course_images', 'thumb')}}" alt="No photo available"></td>
                    <td>{{$question->short_text}}</td>
                    <td>{{$question->position}}</td>

                    <td>{{$question->downloadable_files}}</td>

                    <td> <a class="btn btn-primary" href="{{route('questions.restore',$question->id)}}">Restore</a></td>
                    <td> <a class="btn btn-primary" href="{{route('questions.forceDelete',$question->id)}}">Force Delete</a></td>

                </tr>
            @endforeach
          </tbody>
        </table>
    </div>


@endsection
