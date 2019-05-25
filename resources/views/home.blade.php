@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="mb-3"><a href="{{ route('posts.create') }}" class="btn btn-default pull-right">Create New</a>
        </button>
        @foreach($posts as $post)
            @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="border mb-2 p-2">
                    <div class="border-bottom">
                        {{ $post->title }} -
                        <small>by {{ $post->user->name }}</small>
                    </div>
                    <div class="content mt-1">
                        {{ str_limit($post->body, 150) }}
                    </div>
                    <div class="text-right">
                        {{ $post->created_at->toDayDateTimeString() }}
                    </div>
                    <div class="row mb-2 col-md-4">
                        <div class="col">
                            <a href="{{ url("/post/{$post->id}") }}" class="btn btn-sm btn-primary">See
                                more</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                        <div class="col">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <div class="border mb-2 p-2">
                        <div class="border-bottom">
                            {{ $post->title }} -
                            <small>by {{ $post->user->name }}</small>
                        </div>
                        <div class="content mt-1">
                            {{ str_limit($post->body, 150) }}
                        </div>
                        <div class="text-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </div>
                        <div class="col">
                            <a href="{{ url("/post/{$post->id}") }}" class="btn btn-sm btn-primary">See
                                more</a>
                        </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection

