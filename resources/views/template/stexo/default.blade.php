<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.stexo._partials._head')
    @yield('css_tambahan')
</head>
<body>
    <div class="header-bg">
        <header id="topnav">
            @include('template.stexo._partials._header')
            @include('template.stexo._partials._navbar')
        </header>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            @include('template.stexo._partials._breadcrumb')
            @yield('content')
        </div>
    </div>
    @include('template.stexo._partials._footer')
    @include('template.stexo._partials._script')
    @yield('script_tambahan')
</body>
</html>
