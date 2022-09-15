<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Recent Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($data->take(3) as $key)
                            <a href="{{ url('page/'.$key->post_id) }}"
                               class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{asset('page/'.$key->imgpath)}}" width = "90" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ $key->title }}</h5>
                                    <small>{{ substr($key->created_at, 0, 10) }}</small>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($dataa->take(3) as $key)
                            <a href="{{ url('page/'.$key->post_id) }}"
                               class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{asset('page/'.$key->imgpath)}}" width = "90" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ $key->title }}</h5>
                                    <small>{{ substr($key->created_at, 0, 10) }}</small>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach($categoriess as $cat)
                                <li><a href="{{ url('category/'.$cat->category_id) }}">{{ $cat->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->
        <div>

                    <a style="align-content: center" href="/"><img class="mx-auto d-block" src="{{asset('page/upload/Ex.png')}}" height=200 alt=""></a>

        </div><!-- end col -->
{{--        <div class="row">--}}
{{--            <div class="col-md-12 text-center">--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div><!-- end container -->

</footer><!-- end footer -->

<script src="{{asset('js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'powerpaste advcode table lists checklist',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
    });
</script>
