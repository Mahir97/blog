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
                                <form class="form-wrapper" action="{{ route('senddata')  }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h2>Create a Post</h2>
                                    <h5>Category</h5>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <h5>Title</h5>
                                    <input type="text" class="form-control" name="title">
                                    <h5>Short Description</h5>
                                    <input type="text" class="form-control" name="description">
{{--                                    <input type="text" class="form-control" placeholder="Image Path" name="imgpath">--}}
                                    <h5>Image</h5>
                                    <input id="image" type="file" class="form-control" name="image">
                                    <h5>Write Your Post</h5>
                                    <textarea id="myeditorinstance" class="form-control" name="body"></textarea>
                                    <hr class="invis">
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
