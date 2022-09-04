@extends('Layout.main')

@section('content')

    <section class="section lb">
        <div class="container">
            <div class="row">


                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">


                        <hr class="invis">

                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="/Post" method="post">
                                    @csrf
                                    <h4>Create a Post</h4>
                                    <input type="text" class="form-control" placeholder="Category" name="category">
                                    <input type="text" class="form-control" placeholder="Title" name="title">
                                    <input type="text" class="form-control" placeholder="Short Description" name="description">
                                    <input type="text" class="form-control" placeholder="Image Path" name="imgpath">
                                    <textarea class="form-control" placeholder="Write Your Post" name="body"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
{{--            </div><!-- end row -->--}}
{{--        </div><!-- end container -->--}}
{{--    </section>--}}

@endsection
