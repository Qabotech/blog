@extends('layouts.app')
@section('content')
    <div class="cont flex center column">
        <form action="/blog" method="post" class="add_post flex center column" enctype="multipart/form-data">
            <h1>Add new Post</h1>
            @csrf
            <input class="form-control px-3 py-2 " value="{{ old('title') }}" name="title" type="text" placeholder="title">
            @error('title')
                {{ $message }}
            @enderror

            <textarea class="form-control px-3 py-2 " placeholder="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                {{ $message }}
            @enderror
            <select class="form-select" aria-label="Default select example" name="cat">
                <option selected disabled hidden>Open this select menu</option>
                <option value="PC">PC</option>
                <option value="Phones">Phones</option>
                <option value="IT">IT</option>
                <option value="Programming">Programming</option>
            </select>
            <input class="form-control px-3 py-2 " value="{{ old('image_path') }}" name="image_path" type="text"
                placeholder="Custom image path unlimited size">
            @error('image_path')
                {{ $message }}
            @enderror
            <h1>OR</h1>
            <input class="form-control form-control-lg"value="{{ old('image') }}" name="image" type="file">
            @error('image')
                {{ $message }}
            @enderror
            <input type="submit" value="Post" class="button">

        </form>
    </div>
@endsection
