@extends('templates.master')

@section('body')
<div>
    {{ Breadcrumb::create(Settings::createBreadcrumbs()) }}
</div>
<h1>My Account</h1>
<div>
@if (!$user->userProfile)
    No profile added yet
@else
    Profile Added
@endif
</div>
<div>
    @if (!$user->userDetail)
    Welcome {{ $user->email }}
    @else
        @if (!$user->userDetail->first_name)
            Welcome {{ $user->email }}
        @else
            Welcome {{ $user->userDetail->first_name }}
        @endif
    @endif
</div>
@stop

@section('head')
    @parent
    {{ HTML::script('assets/javascript/account.js') }}
@stop