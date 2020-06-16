

@extends('layouts/admin_app')

@section('content')



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
                    <td><a class="btn btn-primary" href="{{route('users.restore',$user->id)}}">Restore</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
