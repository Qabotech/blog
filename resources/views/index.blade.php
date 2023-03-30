@extends('layouts.app')
@section('content')
    <style>

    </style>
    <div class="content">
        <div class="hero end">
            <h1>Welcome to my S1mple Blog</h1>
            <a href="/" class="button">Start Reading </a>
        </div>
        <div class="cont flex center column end">
            <div class="paragraph">
                <img src="https://picsum.photos/id/1084/900/900?grayscale" alt="">
                <h3>how to save the seals?</h3>
                <p>
                    Seals are beloved marine mammals that inhabit both the Arctic and Antarctic regions, and they play a
                    vital role in maintaining a healthy ocean ecosystem. Unfortunately, seals face numerous threats that
                    have resulted in population declines in recent years. To save the seals, we need to take immediate
                    action to address these threats.
                </p>
                <a href="/" class="button">Read more</a>
            </div>
        </div>
        <div class="blogCatWrapper flex center column end">
            <h1 class="F400 flex center uppercase">Blog Catigoires</h1>
            <div class="blogCat flex center wrap">
                <h2>PC</h2>
                <h2>Phones</h2>
                <h2>IT</h2>
                <h2>Programming</h2>
            </div>
        </div>
        <div class="cont recent flex center column end">
            <h1 class="uppercase F400">Recent posts</h1>
            <div class="post flex column">
                <p>
                    PHP is a general-purpose scripting language geared toward web development. It was originally created
                    by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.The PHP reference
                    implementation is now produced by The PHP Group.
                </p>
                <img
                    src="https://i0.wp.com/entwickler-gilde.de/wp-content/uploads/2020/07/wordpress-876983_1920.jpg?fit=1920%2C1079&ssl=1">
                <p class="text flex column">
                    <span class="cat-block flex center">Programming</span>
                    <br>
                    PHP is a general-purpose scripting language geared toward web development. It was originally created
                    by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.The PHP reference
                    implementation is now produced by The PHP Group.
                    PHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or
                    as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and
                    executed PHP code – which may be any type of data, such as generated HTML or binary image data – would
                    form the whole or part of an HTTP response. Various web template systems, web content management
                    systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of
                    that response. Additionally, PHP can be used for many programming tasks outside the web context, such as
                    standalone graphical applications and robotic drone control. PHP code can also be directly
                    executed from the command line.
                    <a href="/" class="button uppercase flex center">
                        read more
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
