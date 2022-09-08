@extends('Layout.main')

@section('content')

    <section class="section lb m3rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        @foreach($data as $key)
                            @if($key->post_id == $postid)
                                @foreach($categories as $cat)
                                    @if($cat->category_id == $key->category)
                                    <div class="blog-title-area">
{{--                                        <ol class="breadcrumb hidden-xs-down">--}}
{{--                                            <li class="breadcrumb-item"><a href="/">Home</a></li>--}}
{{--                                            <li class="breadcrumb-item"><a href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a></li>--}}
{{--                                            <li class="breadcrumb-item active">{{$key->title}}</li>--}}
{{--                                        </ol>--}}

                                        <span class="color-yellow"><a href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a></span>

                                        <h3>{{$key->title}}</h3>

                                        @foreach($writer as $wri)
                                            @if($key->poster_id == $wri->user_id)
                                                <div class="blog-meta big-meta">
                                                    <small><a title="">{{ substr($key->created_at, 0, 10) }}</a></small>
                                                    <small><a title="">By {{ $wri->name }}</a></small>
                                                    <small><a title=""><i class="fa fa-eye"></i> {{$key->clicks}}</a></small>
                                                </div><!-- end meta -->
                                            @endif
                                        @endforeach

                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                    </div><!-- end title -->

                                    <div class="single-post-media">
                                        <img src="{{$key->imgpath}}" alt="" class="img-fluid">
                                    </div><!-- end media -->

                                    <div class="blog-content">
                                        <div class="pp">
                                            <h3><strong>{{$key->description}}</strong></h3>
                                            <p>{!! $key->body !!}</p>
                                        </div><!-- end pp -->
                                    </div><!-- end content -->
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                <small><a href="#" title="">lifestyle</a></small>
                                <small><a href="#" title="">colorful</a></small>
                                <small><a href="#" title="">trending</a></small>
                                <small><a href="#" title="">another tag</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->


                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    @foreach($data as $key)
                                        @if($key->post_id == $postid)
                                            @foreach($writer as $wri)
                                                @if($wri->user_id == $key->poster_id)

                                                <h4><a href="#">{{ $wri->name }}</a></h4>
                                                <p>{{ $wri->bio }}</p>
                                                <div class="topsocial">
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                                </div><!-- end social -->
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                @foreach($dataa->take(3) as $key)
                                    @if(($key->post_id != $postid))
                                        <div class="col-lg-6">
                                            <div class="blog-box">
                                                <div class="post-media">
                                                    <a href="{{ url('page/'.$key->post_id) }}" title="">
                                                        <img src="{{asset('page/'.$key->imgpath)}}" width = "800" alt="" class="img-fluid">
                                                        <div class="hovereffect">
                                                            <span class=""></span>
                                                        </div><!-- end hover -->
                                                    </a>
                                                </div><!-- end media -->
                                                <div class="blog-meta">
                                                    <h4><a href="{{ url('page/'.$key->post_id) }}" title="">{{ $key->title }}</a></h4>
                                                    <small><a href="{{ url('page/'.$key->post_id) }}" title="">{{ substr($key->created_at, 0, 10) }}</a></small>
                                                </div><!-- end meta -->
                                            </div><!-- end blog-box -->
                                        </div><!-- end col -->
                                    @endif
                                @endforeach

                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        @foreach($data as $key)
                            @if($key->post_id == $postid)
                                @if($key->comments != 0)

                                    <div class="custombox clearfix">
                                        @foreach($data as $key)
                                            @if($key->post_id == $postid)
                                                <h4 class="small-title">{{$key->comments}} Comments</h4>
                                            @endif
                                        @endforeach
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="comments-list">
                                                    @foreach($comments as $com)
                                                        @if($com->post_id == $postid)
                                                            @foreach($writer as $wri)
                                                                @if($wri->user_id == $com->commenter_id)
                                                                    <div class="media">
                                                                        <a class="media-left" href="#">
                                                                            <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                                        </a>

                                                                        <div class="media-body">
                                                                            <h4 class="media-heading user_name">{{ $wri->name }} <small>{{ $com->created_at }}</small></h4>
                                                                            <p>{!! $com->comment !!}</p>
            {{--                                                                <a href="#" class="btn btn-primary btn-sm">Reply</a>--}}
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end custom-box -->
                                @endif
                            @endif
                        @endforeach

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">Leave a Reply</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-wrapper" action="/comment" method="post">
                                        @csrf
{{--                                        <input type="text" class="form-control" placeholder="Your name">--}}
{{--                                        <input type="text" class="form-control" placeholder="Email address">--}}
{{--                                        <input type="text" class="form-control" placeholder="Website">--}}
                                        @if(session()->has('logid'))
                                            <span class="text-danger">@error('comment'){{$message}} @enderror</span>
                                            <textarea id = "myeditorinstance" class="form-control" name="comment" placeholder="Your comment"></textarea>
                                            <input type="hidden" name="postid" value={{ $postid }}>
                                            <hr class="invis">
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        @endif
                                    </form>
                                    @if(!(session()->has('logid')))
                                        <a href = "/Login" class="btn btn-primary">  Login To Comment</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

@endsection
