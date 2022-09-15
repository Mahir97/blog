@include('Partials._head')

<body>

<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            @include('Partials._navbar')
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

    @yield('content')

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
