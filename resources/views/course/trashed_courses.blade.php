

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('courses.index')}}">All courses </a>
    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Logo</th>
                <th scope="col">Teacher</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Start Date</th>
                {{-- <th scope="col">Number of students enrolled</th>--}}



            </tr>
            </thead>

            <tbody>
            @foreach($courses as $course)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$course->title}}</td>
                    <td><img src="{{$course->getFirstMediaUrl('course_images', 'thumb')}}" alt="No photo available"></td>
                    <td>@if($course->user)
                            {{$course->user->name}}
                        @else
                            {{'teacher account deleted'}}
                        @endif
                    </td>
                    {{--@foreach($course->user() as $user)
                    <td>{{$user->name}}</td>
                    @endforeach--}}
                    <td>{{$course->description}}</td>
                    <td>{{$course->price}}</td>

                    <td>{{$course->start_date}}</td>
                    <td> <a class="btn btn-primary" href="{{route('courses.restore',$course->id)}}">Restore</a></td>
                    <td> <a class="btn btn-primary" href="{{route('courses.forceDelete',$course->id)}}">Force Delete</a></td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
