<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($pageTitle) ? $pageTitle . ' - ' : '' }}{{ Settings::SiteName() }}</title>
    @section('head')
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.css') }}
    {{ HTML::style('assets/css/nav-fix.css') }}
    {{ HTML::style('assets/css/prettify.css') }}
    {{ HTML::style('assets/css/app.css') }}
    {{ Basset::show('bootstrapper.js') }}
    @show
</head>
<body>

    <div class="wrap">
    @include('site._header')

    <div class="container main">

        @if ($message = Session::get('success'))
            {{ Alert::success($message) }}
        @endif

        @yield('body')

        <div class="push"></div>

    </div>
    </div>
    @include('site._footer')

</body>
</html>