@extends('Layout.main')

@section('content')

{{--    <div class="page-title db">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--                    <h2> Blog <small class="hidden-xs-down hidden-sm-down"> Welcome To The Best Blog Ever Friends! </small></h2>--}}
{{--                </div><!-- end col -->--}}
{{--                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">--}}
{{--                </div><!-- end col -->--}}
{{--            </div><!-- end row -->--}}
{{--        </div><!-- end container -->--}}
{{--    </div><!-- end page-title -->--}}
{{--<section class="section">--}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($dataa->take(3) as $val=>$key)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$val}}" class="@if($loop->first) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($dataa->take(3) as $key)
            <div class="carousel-item @if($loop->first) active @endif" style="height: 500px;">
{{--                style="height: 400px;"--}}
                <img class="img-fluid w-100 h-100" src="{{asset('page/'.$key->imgpath) }}" style="object-fit: cover;">
                <div class="carousel-caption d-none d-md-block" style="backdrop-filter: blur()">
                    <a href="{{ url('page/'.$key->post_id) }}" title="{{ $key->title }}"><h1 style="color: white;" background: #6c2d2d9e;>{{ $key->title }}</h1></a>
                    <p style="color: #edebf2">{{ $key->description }}</p>
                </div>
            </div>

            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>

{{--</section>--}}

{{--    <section id="cta" class="section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 col-md-12 align-self-center">--}}
{{--                    <h2>A digital marketing blog</h2>--}}
{{--                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>--}}
{{--                    <a href="#" class="btn btn-primary">Try for free</a>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-12">--}}
{{--                    <div class="newsletter-widget text-center align-self-center">--}}
{{--                        <h3>Subscribe Today!</h3>--}}
{{--                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>--}}
{{--                        <form class="form-inline" method="post">--}}
{{--                            <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />--}}
{{--                            <input type="submit" value="Subscribe" class="btn btn-default btn-block" />--}}
{{--                        </form>--}}
{{--                    </div><!-- end newsletter -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
                            <div class="blog-box wow fadeIn">
                                @foreach($data as $key)

                                <div class="post-media">
                                        <a href="{{ url('page/'.$key->post_id) }}" title="{{ $key->title }}">
                                        <img src="{{asset('page/'.$key->imgpath) }}" alt="" class="img-fluid">
                                        <div class="hovereffect">
                                            <span></span>
                                        </div>
                                        <!-- end hover -->
                                    </a>
                                </div>

                                <!-- end media -->
                                <div class="blog-meta big-meta text-center">
                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div><!-- end post-sharing -->
                                    <h4><a href='{{ url('page/'.$key->post_id) }}' title="{{ $key->title }}">{{ $key->title }}</a></h4>
                                    <p>{{ $key->description }}</p>
                                    @foreach($writer as $wri)
                                        @if($wri->user_id == $key->poster_id)
                                            @foreach($categories as $cat)
                                                @if($cat->category_id == $key->category)
                                                    <small><a href="{{ url('category/'.$key->category) }}" title="">{{ $cat->category_name }}</a></small>
                                                    <small><a href="{{ url('page/'.$key->post_id) }}" title="">{{ substr($key->created_at, 0, 10) }}</a></small>
                                                    <small><a title="">By {{ $wri->name }}</a></small>
                                                    <small><a href="{{ url('page/'.$key->post_id) }}" title=""><i class="fa fa-eye"></i> {{ $key->clicks }}</a></small>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div><!-- end meta -->
                                @endforeach
                            </div><!-- end blog-box -->
                        </div>
                    </div>

                    <hr class="invis">


                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $data->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

@endsection
