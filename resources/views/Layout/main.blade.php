@include('Partials._head')

<body>

<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            @include('Partials._navbar')
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

    @yield('content')

    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        @include('Partials._sidebar')
    </div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
</section>

@include('Partials._footer')

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
