@if (Auth::user() && Auth::user()->name == $post->user->name)


    @extends('layouts.app')

    @section('content')
        <div class="cont flex center column">
            <form action="/blog/{{ $post->slug }}" method="POST" class="add_post flex center column"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1>Edit Post</h1>

                <input class="form-control px-3 py-2 " value="{{ $post->title }}" name="title" type="text"
                    placeholder="title">
                @error('title')
                    {{ $message }}
                @enderror

                <textarea class="form-control px-3 py-2 " placeholder="description" name="description">{{ $post->description }}</textarea>
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
                <script>
                    var cat = "{{ $post->cat }}"
                    var option = $('.form-select').children('option');
                    for (let i = 0; i < option.length; i++) {
                        if (option[i].value == cat) {
                            $(option[i]).attr("selected", "true");
                        }
                    }
                </script>
                <input class="form-control px-3 py-2 " value="{{ $post->image_path }}" name="image_path" type="text"
                    placeholder="Custom image path unlimited size">
                @error('image_path')
                    {{ $message }}
                @enderror
                <h1>OR</h1>
                <input class="form-control form-control-lg"value="{{ old('image') }}" name="image" type="file">
                @error('image')
                    {{ $message }}
                @enderror
                <input type="submit" value="Submit edit" class="button">

            </form>
        </div>
    @endsection
@else
    <script>
        window.location.href = '/';
    </script>
@endif
