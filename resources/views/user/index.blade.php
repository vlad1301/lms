

@extends('layouts/admin_app')

@section('content')


    <a class="btn btn-info" href="{{route('users.trashed')}}">Trash </a>
    <div class="table-responsive">
    <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Photo</th>
                <th scope="col">Role</th>
                <th scope="col">Created_at</th>

            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><img src="{{$user->getFirstMediaUrl('images', 'thumb')}}" alt="{{$user->name}}"></td>
                {{--@foreach($user->role as $role)
                <td>{{$role->name}}</td>
                @endforeach--}}
                <td>{{$user->role->name}}</td>
                <td>{{$user->created_at->format('m-d-Y')}}</td>
                {{--<td><img src="{{$user->getUrl('images')}}" alt="{{$user->name}}"></td>--}}
              {{--  <td><a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a></td>
                <td><a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a></td>--}}
                <td><form action="{{ route('users.destroy',$user->id) }}" method="POST">
                <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
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
