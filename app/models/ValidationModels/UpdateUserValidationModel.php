<?php

namespace ValidationModels;

class UpdateUserValidationModel extends \User
{
    //public $email;
    //public $password;
    //public $confirm_password;
    public $id;
    private $emailRule = 'required|email|unique:users,email,1';

    protected $fillable = array(
        'email',
        'title',
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'country_name',
        'postcode',
        'telephone_home',
        'telephone_work',
        'telephone_mobile',
        'profile_picture',
        'bio',
        'signature',
        'website_url',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'google_plus_url',
    );


    public $rules = array(
        'email' => 'required|email|unique:users,email',
        'title' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'address_line_1' => 'required',
        'address_line_2' => 'required',
        //'address_line_3' => 'required',
        'city' => 'required',
        'country_name' => 'required',
        'postcode' => 'required',
        'telephone_home' => 'required',
        //'telephone_work' => 'required',
        //'telephone_mobile' => 'required',
        'bio' => 'required',
        //'signature' => 'required',
        'website_url' => 'required|url',
        'facebook_url' => 'required|url',
        //'twitter_url' => 'required|url',
        //'linkedin_url' => 'required|url',
        //'instagram_url' => 'required|url',
        //'google_plus_url' => 'required|url',
    );
}