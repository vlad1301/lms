

@extends('layouts/admin_app')

@section('content')



    <div class="table-responsive">
        <table class="table table-hover" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Image</th>
                <th scope="col">Score</th>

            </tr>
            </thead>

            <tbody>
          {{--  @foreach($mediaItems as $mediaItem)
            <td><img src="{{$mediaItem->getUrl()}}" alt="{{$questions->name}}"></td>
            @endforeach--}}
            <td><img src="{{$mediaItems->getUrl()}}" alt="{{$questions->name}}"></td>


            {{--
                        <a href="{{$mediaItem->getUrl()}}" class="image-popup gal-item"><img src="{{$mediaItem->getUrl('thumb')}}" alt="Image" class="img-fluid"></a>
            --}}


            {{--@foreach($questions as $question)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$question->question}}</td>
                    <td><img src="{{$questions->getUrl()}}" alt="{{$questions->name}}"></td>
                    <td>{{$question->score}}</td>
                    <
                    --}}{{--  <td><a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a></td>
                      <td><a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a></td>--}}{{--
                    <td><form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{route('questions.edit',$question->id)}}">Edit</a>
                            <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>
                            --}}{{--
                                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>--}}{{--

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>


                </tr>
            @endforeach--}}
            </tbody>
        </table>
    </div>


@endsection
