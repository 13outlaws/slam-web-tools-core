<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($pageTitle) ? $pageTitle . ' - ' : '' }}{{ Settings::SiteName() }}</title>
    @section('head')
    {{ HTML::style('assets/css/admin/admin-bootstrap.css') }}
    {{ HTML::style('assets/css/admin/admin-bootstrap-responsive.css') }}
    {{ HTML::style('assets/css/admin/nav-fix.css') }}
    {{ HTML::style('assets/css/admin/prettify.css') }}
    {{ HTML::style('assets/css/admin/admin.css') }}
    {{ Basset::show('bootstrapper.js') }}
    @show
</head>
<body>

    <div class="wrap">
    @include('admin._admin_header')

    <div class="container main">

        @if ($message = Session::get('success'))
            {{ Alert::success($message) }}
        @endif

        @yield('body')

        <div class="push"></div>

    </div>
    </div>
    @include('admin._admin_footer')

</body>
</html>