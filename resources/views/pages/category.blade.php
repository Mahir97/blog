@extends('Layout.main')

@section('content')

    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    @foreach($categories as $cat)
                        @if($cat->category_id == @$categoryid)
                            <h2> {{ $cat->category_name }} </h2>
                        @endif
                    @endforeach
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-custom-build">
{{--                            <ol class="breadcrumb hidden-xs-down">--}}
{{--                                @foreach($categories->take(1) as $cat)--}}
{{--                                    @if($cat->category_id == $categoryid)--}}
{{--                                        <li class="breadcrumb-item"><a href="/">Home</a></li>--}}
{{--                                        <li class="breadcrumb-item">{{ $cat->category_name }}</li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </ol>--}}
                            <div class="blog-box wow fadeIn">
                                @foreach($data as $key)
                                    @if($key->category == $categoryid)

                                    <div class="post-media">
                                        <a href="{{ url('page/'.$key->post_id) }}" title="{{ $key->title }}">
                                            <img src="{{ asset('page/'.$key->imgpath) }}" alt="" class="img-fluid">
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
                                        <h4><a href="{{ url('page/'.$key->post_id) }}" title="{{ $key->title }}">{{ $key->title }}</a></h4>
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
                                    @endif
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
