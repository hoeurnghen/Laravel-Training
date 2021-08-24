@extends('layouts.app')

@section('content')
    <h2 class="pt-3">Edit Post</h2>
    {!! Form::open(["action" => ["App\Http\Controllers\PostsController@update", $post->id], "method" => "POST", "class" => "form"]) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn-primary'])}}
    {!! Form::close() !!}

@endsection