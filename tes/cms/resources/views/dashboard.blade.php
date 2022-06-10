<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard CMS </title>
    @include('partials.head')
</head>

<body>

    <!--Preloader start-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--Preloader end-->

    <!--Main wrapper start-->
    <div id="main-wrapper">

        @include('element.nav-header')
        @include('element.sidebar')
        <!--Content body start-->

        <div class="content-body">
            
            @yield('content')

        </div>
        <!-- Content body end -->



        @include('element.footer')


    </div>
    <!-- Main wrapper end -->

    @include('partials.foot')
    @stack('scripts')
</body>

</html>
