@extends('Layout.nosidebar')

@section('content')

    <section class="section lb m3rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="/Login" method="post">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                    @endif
                                    @csrf
                                    <h4>Login</h4>
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                                    <button type="submit" class="btn btn-primary">Submit <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
    {{--            </div><!-- end row -->--}}
    {{--        </div><!-- end container -->--}}





@endsection

