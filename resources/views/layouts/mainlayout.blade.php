<html>
<html lang="en">
<head>
    @include('layouts.partial.head')
</head>
<body>
    <div id="wrapper">
        @include('layouts.partial.topbar')
        @include('layouts.partial.sidebar')
        @yield('content')
    <div class="clearfix"></div>
        @include('layouts.partial.footer')
    </div>
        @include('layouts.partial.footer-script')
</body>
</html>