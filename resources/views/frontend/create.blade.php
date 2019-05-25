@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="create-form">
                <form method="post" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Content</label>
                        <input type="text" class="form-control" name="body">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
