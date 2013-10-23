@extends('templates.master')

@section('body')
<div class="row">
    <div class="span12">
        <h1>Log in</h1>
    </div>
</div>
<div class="row">
    <div class="span6">
        {{ Form::open(array('route' => 'auth.authorise')) }}
            {{ Form::control_group(
                Form::label('email', 'Email'),
                Form::span6_email('email'),
                !$errors->has('email') ? '' : 'error'
            ) }}
            {{ Form::control_group(
                Form::label('password', 'Password'),
                Form::span6_password('password'),
                !$errors->has('password') ? '' : 'error'
            ) }}
            <div style="padding-top: 10px; padding-bottom: 15px">
                {{ Form::control_group(
                    Form::labelled_checkbox('remember', 'Remember Me'),
                    null
                ) }}
            </div>
            @if ($errors->count() > 0)
                {{ Alert::error("<h4 class=\"alert-heading\">Error(s)</h4>" . Settings::formatErrors($errors->all(':message'))) }}
            @endif
            {{ Form::actions(array(Button::large_primary_submit('Log in')->block())) }}
        {{ Form::close() }}
        <hr/>
        <h4>I don't have an account</h4>
        <p>{{ HTML::linkRoute('account.create', 'Create an account') }}</p>
        <p>{{ HTML::linkRoute('auth.login', 'Forgotten your password?') }}</p>
    </div>
    <div class="span6">
        <h3>{Placeholder}</h3>
        <p>Links to enable sign-up via social media accounts will be shown here</p>
    </div>

</div>
<div class="row">
    <div class="span6 offset3">
    </div>
</div>
@stop

@section('head')
    @parent
@stop