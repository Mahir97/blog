<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/"><img src="{{asset('images/version/market-logo.png')}}" height=55 alt=""></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            @foreach($categories as $cat)
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a>
                </li>
            @endforeach
            <li class="nav-item">
                <a class="nav-link" href="marketing-contact.html">Contact Us</a>
            </li>
            @if(session()->has('logid'))
                <li class="nav-item">
                    <a class="nav-link" href="/Post">Create a Post</a>
                </li>
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
