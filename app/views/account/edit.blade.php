@extends('templates.master')

@section('body')
<div class="row">
    <div class="span12">
        <h1>Edit My Account</h1>
    </div>
</div>
<div>
    {{ Breadcrumb::create(Settings::createBreadcrumbs()) }}
</div>
<div class="row">
    <div class="span6 offset3">
        @if ($errors->count() > 0)
        {{ Alert::error("<h4 class=\"alert-heading\">Error(s)</h4>" . Settings::formatErrors($errors->all(':message'))) }}
        @endif
    </div>
</div>

    {{ Form::model($user, array('route' => 'account.update', 'method' => 'PUT')) }}
    {{ Form::hidden('id') }}
    {{ Form::hidden('userDetail[country_name]', '', array('id' => 'userDetail[country_name]')) }}
<div class="row">
    <div id="personal_details" class="span6">
        <h2>Personal Details</h2>
        <h4>Name</h4>
        {{ Form::control_group(
            Form::label('userDetail[title]', 'Title'),
            Form::span6_select('userDetail[title]', Settings::nameTitlesList(), $user->userDetail->title),
            !$errors->has('title') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[first_name]', 'First Name'),
            Form::span6_text('userDetail[first_name]'),
            !$errors->has('first_name') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[last_name]', 'Last Name'),
            Form::span6_text('userDetail[last_name]'),
            !$errors->has('last_name') ? '' : 'error'
        ) }}
        <h4>Address</h4>
        {{ Form::control_group(
            Form::label('userDetail[address_line_1]', 'Address Line 1'),
            Form::span6_text('userDetail[address_line_1]'),
            !$errors->has('address_line_1') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[address_line_2]', 'Address Line 2'),
            Form::span6_text('userDetail[address_line_2]'),
            !$errors->has('address_line_2') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[address_line_3]', 'Address Line 3'),
            Form::span6_text('userDetail[address_line_3]'),
            !$errors->has('address_line_3') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[city]', 'City'),
            Form::span6_text('userDetail[city]'),
            !$errors->has('city') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[postcode]', 'Postcode'),
            Form::span6_text('userDetail[postcode]'),
            !$errors->has('postcode') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[country_iso]', 'Country'),
            Form::span6_select('userDetail[country_iso]', Settings::countryList(), $user->userDetail->country_iso),
            !$errors->has('country_name') ? '' : 'error'
        ) }}
        <h4>Contact Details</h4>
        {{ Form::control_group(
            Form::label('email', 'Email'),
            Form::span6_text('email'),
            !$errors->has('email') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[telephone_home]', 'Home Phone'),
            Form::span6_text('userDetail[telephone_home]'),
            !$errors->has('telephone_home') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[telephone_work]', 'Work Phone'),
            Form::span6_text('userDetail[telephone_work]'),
            !$errors->has('telephone_work') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userDetail[telephone_mobile]', 'Mobile'),
            Form::span6_text('userDetail[telephone_mobile]'),
            !$errors->has('telephone_mobile') ? '' : 'error'
        ) }}
    </div>
    <div id="profile" class="span6">
        <h2>Profile</h2>
        <h4>About Me</h4>
        {{ Form::control_group(
            Form::label('userProfile[bio]', 'Bio'),
            Form::span6_textarea('userProfile[bio]', null, array('style' => 'height:154px;')),
            !$errors->has('bio') ? '' : 'error'
        ) }}
        <h4>Websites</h4>
        {{ Form::control_group(
            Form::label('userProfile[website_url]', 'My Website'),
            Form::span6_url('userProfile[website_url]'),
            !$errors->has('website_url') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userProfile[facebook_url]', 'Facebook'),
            Form::span6_url('userProfile[facebook_url]'),
            !$errors->has('facebook_url') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userProfile[twitter_url]', 'Twitter'),
            Form::span6_url('userProfile[twitter_url]'),
            !$errors->has('twitter_url') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userProfile[linkedin_url]', 'LinkedIn'),
            Form::span6_url('userProfile[linkedin_url]'),
            !$errors->has('linkedin_url') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userProfile[instagram_url]', 'Instagram'),
            Form::span6_url('userProfile[instagram_url]'),
            !$errors->has('instagram_url') ? '' : 'error'
        ) }}
        {{ Form::control_group(
            Form::label('userProfile[google_plus_url]', 'Google+'),
            Form::span6_url('userProfile[google_plus_url]'),
            !$errors->has('google_plus_url') ? '' : 'error'
        ) }}
        <h4>Other</h4>
        {{ Form::control_group(
        Form::label('userProfile[signature]', 'Signature'),
        Form::span6_textarea('userProfile[signature]'),
        !$errors->has('signature') ? '' : 'error'
        ) }}
    </div>
</div>
<div class="row">
    <div class="span6 offset3">
        {{ Form::actions(array(Button::primary_large_submit('Update Details')->block())) }}
    </div>
</div>
    {{ Form::close() }}
@stop

@section('head')
    @parent
{{ HTML::script('assets/javascript/account.js') }}
@stop