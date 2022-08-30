@extends('Layout.main')

@section('content')

    <section class="section lb m3rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="/Register" method="post">
                                    @csrf
                                    <h4>Register Your Account</h4>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                    <input type="text" class="form-control" placeholder="Password" name="password">
                                    <textarea class="form-control" placeholder="Write About Yourself" name="bio"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->

@endsection
