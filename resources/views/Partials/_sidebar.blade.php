<div class="sidebar">
    <div class="widget-no-style">
        <div class="newsletter-widget text-center align-self-center">
            <h3>Subscribe Today!</h3>
            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
            <form class="form-inline" method="post">
                <input type="text" name="email" placeholder="Add your email here.." required
                       class="form-control"/>
                <input type="submit" value="Subscribe" class="btn btn-default btn-block"/>
            </form>
        </div><!-- end newsletter -->
    </div>

    <div class="widget">
        <h2 class="widget-title">Recent Posts</h2>
        <div class="blog-list-widget">
            @foreach($data->take(3) as $key)

                <div class="list-group">
                    <a href="{{ url('page/'.$key->post_id) }}"
                       class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{asset('page/'.$key->imgpath)}}" width = "90" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{$key->title}}</h5>
                            <small>12 Jan, 2016</small>
                        </div>
                    </a>
                </div>

            @endforeach
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div id="" class="widget">
        <h2 class="widget-title">Advertising</h2>
        <div class="banner-spot clearfix">
            <div class="banner-img">
                <img src="upload/banner_03.jpg" alt="" class="img-fluid">
            </div><!-- end banner-img -->
        </div><!-- end banner -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Popular Categories</h2>
        <div class="link-widget">
            <ul>
                <li><a href="#">Marketing <span>(21)</span></a></li>
                <li><a href="#">SEO Service <span>(15)</span></a></li>
                <li><a href="#">Digital Agency <span>(31)</span></a></li>
                <li><a href="#">Make Money <span>(22)</span></a></li>
                <li><a href="#">Blogging <span>(66)</span></a></li>
                <li><a href="#">Entertaintment <span>(11)</span></a></li>
                <li><a href="#">Video Tuts <span>(87)</span></a></li>
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
