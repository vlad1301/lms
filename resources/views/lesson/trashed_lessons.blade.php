

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('lessons.index')}}">All Lessons </a>
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
            @foreach($lessons as $lesson)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$lesson->title}}</td>
                    <td><img src="{{$lesson->getFirstMediaUrl('course_images', 'thumb')}}" alt="No photo available"></td>
                    <td>{{$lesson->short_text}}</td>
                    <td>{{$lesson->position}}</td>

                    <td>{{$lesson->downloadable_files}}</td>

                    <td> <a class="btn btn-primary" href="{{route('lessons.restore',$lesson->id)}}">Restore</a></td>
                    <td> <a class="btn btn-primary" href="{{route('lessons.forceDelete',$lesson->id)}}">Force Delete</a></td>

                </tr>
            @endforeach
          </tbody>
        </table>
    </div>


@endsection
