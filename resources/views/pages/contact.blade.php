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
                                <form class="form-wrapper" action="{{ route('cm')  }}" method="post">
                                    @csrf
                                    <h2>Contact Us</h2>
                                    <h5>Your Name</h5>
                                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    <h5>Email</h5>
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                    <h5>Subject</h5>
                                    <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                    <input type="text" class="form-control" name="subject" value="{{old('subject')}}">
                                    <h5>Write Your Message</h5>
                                    <span class="text-danger">@error('message'){{$message}} @enderror</span>
                                    <textarea class="form-control" name="message">{{old('message')}}</textarea>
                                    <hr class="invis">
                                    <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
    {{--            </div><!-- end row -->--}}
    {{--        </div><!-- end container -->--}}
    {{--    </section>--}}

@endsection
