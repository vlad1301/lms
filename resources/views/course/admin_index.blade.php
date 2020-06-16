

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('courses.trashed')}}">Trash </a>
    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Logo</th>
                @if($user_admin)
                    <th scope="col">Teacher</th>
                @endif
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
                    @if($user_admin)
                        <td>@if($course->user)
                                {{$course->user->name}}
                            @else
                                {{'teacher account deleted'}}
                            @endif
                        </td>
                    @endif
                    {{--@foreach($course->user() as $user)
                    <td>{{$user->name}}</td>
                    @endforeach--}}
                    <td>{{$course->description}}</td>
                    <td>{{$course->price}}</td>

                    <td>{{$course->start_date}}</td>

                    <td><form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{route('courses.edit',$course->id)}}">Edit</a>
                            <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Show</a>
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
