

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('lessons.trashed')}}">Trash </a>
    <div class="table-responsive">
    <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Course</th>
                <th scope="col">Logo</th>
                <th scope="col">Description</th>
                <th scope="col">Position</th>
                <th scope="col">download_files</th>
               {{-- <th scope="col">Number of students enrolled</th>--}}



            </tr>
            </thead>

            <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <th scope="row">1</th>
                <td>{{$lesson->title}}</td>
                <td>{{$lesson->course->title}}</td>
                <td><img src="{{$lesson->getFirstMediaUrl('course_images', 'thumb')}}" alt="No photo available"></td>
              {{--  @if($user)
                <td>@if($course->user)
                        {{$course->user->name}}
                    @else
                        {{'teacher account deleted'}}
                    @endif
                </td>
                @endif--}}
                {{--@foreach($course->user() as $user)
                <td>{{$user->name}}</td>
                @endforeach--}}
                <td>{{$lesson->short_text}}</td>
                <td>{{$lesson->position}}</td>

                <td>{{$lesson->downloadable_files}}</td>

                <td><form action="{{ route('lessons.destroy',$lesson->id) }}" method="POST">
                <a class="btn btn-primary" href="{{route('lessons.edit',$lesson->id)}}">Edit</a>
                <a class="btn btn-info" href="{{ route('lessons.show',$lesson->id) }}">Show</a>
{{--
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>--}}

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
