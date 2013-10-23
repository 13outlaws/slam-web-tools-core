<?php

namespace ValidationModels;

class CreateUserValidationModel extends \User
{
    //public $email;
    //public $password;
    //public $confirm_password;

    protected $fillable = array(
        'email',
        'password',
        'confirm_password',
        'terms',
    );

    public $rules = array(
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5|confirmed',
        'password_confirmation' => 'required',
        'terms' => 'required',
    );
}