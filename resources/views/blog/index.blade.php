@extends('layouts.app')
@section('content')
    @if (session()->has('msg'))
        <div class="msg p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 text-bg-danger">
            {{ session()->get('msg') }}
        </div>
    @endif

    <div class="felx center column">
        <h1 class="display-1 fw-bold py-5 ">
            All Posts
        </h1>
        @if (auth()->user())
            <a href="/blog/create" class="button uppercase">
                add a new post
            </a>
        @endif
    </div>
    <br>
    <div class="cont flex center column ">
        @foreach ($posts as $post)
            <div class="post flex center column pb-5">
                <div class="flex center pt-5">
                    @if (str_split($post->image_path, 1)[0] != 'h')
                        <img src="/images/{{ $post->image_path }}" alt="">
                    @else
                        <img src="{{ $post->image_path }}" alt="">
                    @endif
                </div>
                <h3 class="display-5 fw-bold">
                    {{ $post->title }}
                    <br>
                    <span class="h4 text-start flex ">
                        By:
                        <span class="text-capitalize mx-1 text-black-50">{{ $post->user->name }}</span>
                        <span class="mx-2">On</span>
                        <span class=" mx-1 text-black-50">{{ date('d.m.Y', $post->update_at) }}</span>
                    </span>

                    </span>
                </h3>
                <p class="text-black-50 h4">
                    {{ $post->description }}
                </p>
                <a href="/blog/{{ $post->slug }}" class="button">Read more</a>
            </div>
        @endforeach

    </div>
@endsection
