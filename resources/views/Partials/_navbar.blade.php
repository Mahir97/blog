<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/"><img src="{{asset('page/upload/Ex.png')}}" height=70 alt=""></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>

                <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link">Categories</a>
                    <div class="dropdown-content">
                        @foreach($categories as $cat)
                            <a class="nav-link" href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a>
                        @endforeach
                    </div>
                </div>
                </li>
{{--                <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a>--}}
{{--                </li>--}}

            <li class="nav-item">
                <a class="nav-link" href="/Contact">Contact Us</a>
            </li>
            @if(session()->has('logid'))
                @foreach($writer as $key)
                    @if($key->user_id == session()->get('logid') && $key->role == "writer")
                        <li class="nav-item">
                            <a class="nav-link" href="/Post">Write a Post</a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>

            @endif
        </ul>
        @if(!(session()->has('logid')))
            <ol class="breadcrumb">
                <li><a href="/Login">Login</a>/<a href="/Register">Register</a></li>
            </ol>
        @endif
    </div>
</nav>
