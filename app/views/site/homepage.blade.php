@extends('templates.master')

@section('body')
<h1>Homepage</h1>
@if (Auth::Guest())
    <div>You are not logged in</div>
    <div>{{ HTML::linkRoute('auth.login', 'Log In') }}</div>
@else
    <div>You are logged in</div>
    <div>{{ HTML::linkRoute('auth.logout', 'Log Out') }}</div>
@endif
<div>
</div>
@stop

@section('head')
    @parent
@stop