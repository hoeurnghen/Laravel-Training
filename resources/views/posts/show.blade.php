@extends('layouts.app')

@section('content')
    <a href="/posts" class="mt-3 btn btn-outline-primary">Go Back</a>
    <div class="card p-3 mt-3 mb-3">
        <h1>{{$post->title}}</h1>
        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
        <br><br>
        <div>
            {!!$post->body!!}
        </div>
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif
@endsection