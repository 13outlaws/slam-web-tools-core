@extends('templates.master')

@section('body')
<div class="row">
    <div class="span12">
        <h1>Create New Account</h1>
    </div>
</div>
<div class="row">
     <div class="span6">
         {{ Form::open(array('route' => 'account.store')) }}
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
            {{ Form::control_group(
                Form::label('password_confirmation', 'Confirm Password'),
                Form::span6_password('password_confirmation'),
                !$errors->has('password_confirmation') ? '' : 'error'
            ) }}
         <div style="padding-top: 10px; padding-bottom: 15px">
            {{ Form::control_group(
                Form::labelled_checkbox('terms', 'I agree to the site terms and conditions'),
                null,
                !$errors->has('terms') ? '' : 'error'
            ) }}
         </div>
            @if ($errors->count() > 0)
                {{ Alert::error("<h4 class=\"alert-heading\">Error(s)</h4>" . Settings::formatErrors($errors->all(':message'))) }}
            @endif
            {{ Form::actions(array(Button::large_primary_submit('Create Account')->block())) }}
         {{ Form::close() }}
         <hr/>
         <h4>I already have an account</h4>
         <p>{{ HTML::linkRoute('auth.login', 'Log in') }}</p>
         <p>{{ HTML::linkRoute('auth.login', 'Forgotten your password?') }}</p>
     </div>
    <div class="span6">
        <h3>{Placeholder}</h3>
        <p>Links to enable sign-up via social media accounts will be shown here</p>
    </div>
</div>
@stop

@section('head')
    @parent
@stop