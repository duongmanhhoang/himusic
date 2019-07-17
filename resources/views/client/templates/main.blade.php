<!doctype html>
<html lang="en">
<head>
    @include('client.layouts.meta')
    @include('client.layouts.head')

</head>
<body>
<div class="main-page-wrapper">
    {{--<div id="loader-wrapper">--}}
        {{--<div id="loader">--}}
            {{--<span class="loader-inner"></span>--}}
        {{--</div>--}}
    {{--</div>--}}
    @include('client.layouts.nav')
    @include('client.layouts.banner')

    @yield('content')

    @include('client.layouts.footer')
    @include('client.layouts.footer-script')
</div>
</body>


</html>