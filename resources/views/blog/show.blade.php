@extends('layouts.app')
@section('content')
    @if (session()->has('msg'))
        <div class="msg p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 text-bg-success">
            {{ session()->get('msg') }}
        </div>
    @endif

    <style>
        .post img {
            min-height: 50%;
            max-height: unset;
        }
    </style>
    <div class="felx center column pt-5">
        <h1 class="display-1 fw-bold ">
            {{ $post->title }}
        </h1>
    </div>
    <div class="flex center pb-5">
        <div class="post flex center column " @style('width:80vw;')>
            <div class="flex center pt-5">
                @if (str_split($post->image_path, 1)[0] != 'h')
                    <img src="/images/{{ $post->image_path }}" alt="">
                @else
                    <img src="{{ $post->image_path }}" alt="">
                @endif
            </div>
            <h3 class="display-5 fw-bold">
                <br>
                <span class="h4 text-start flex center">
                    By:
                    <span class="text-capitalize mx-1 text-black-50">{{ $post->user->name }}</span>
                    <span class="mx-2">On</span>
                    <span class=" mx-1 text-black-50">{{ date('d.m.Y', $post->update_at) }}</span>
                </span>

                </span>
            </h3>
            <p class="text-black-50 h3 lh-base">
                {{ $post->description }}
            </p>
            <div class="flex" @style('gap:3em;')>
                @if (Auth::user() && Auth::user()->id == $post->user_id)
                    <a href="/blog/{{ $post->slug }}/edit" @style('width:300px;') class="button h3"> Edit Post </a>
                    <form action="/blog/{{ $post->slug }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" href="/blog/{{ $post->slug }}/destroy" @style('width:300px;')
                            class="button h3 text-bg-danger">Delete
                            Post</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
