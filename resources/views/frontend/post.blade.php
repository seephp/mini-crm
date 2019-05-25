@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="border mb-2 p-2">
                        <div class="border-bottom">
                            {{ $post->title }} -
                            <small>by {{ $post->user->name }}</small>
                        </div>
                        <div class="content mt-1">
                            {{ $post->body }}
                        </div>
                        <div class="text-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
