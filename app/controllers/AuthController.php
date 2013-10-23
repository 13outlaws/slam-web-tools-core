<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gavster
 * Date: 17/10/13
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */

class AuthController extends BaseController
{
    public function showLogin()
    {
        // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::route('home')->with('success', 'You are already logged in');
        }
        // Show the login page
        $pageTitle = 'Log In';
        return View::make('auth.login', array('pageTitle' => $pageTitle));
    }

    public function postLogin(){
        //get posted form data
        $postData = Input::all();
        $remember = false;
        if (array_key_exists('remember', $postData)) $remember = 'true';
        $userData = new User($postData);
        //validate form data
        if (!$userData->validate($postData)){
            return \Redirect::back()
                ->withErrors($userData->errors())
                ->withInput();
        }
        //attempt to log user in
        if (!Auth::attempt(array('email' => $userData->email, 'password' => $userData->password), $remember)){
            return Redirect::back()
                ->withErrors(array('not_found' => 'Sorry, the credentials you supplied appear to be incorrect.'))
                ->withInput();
        }
        return Redirect::intended('/')->with('success', 'Logged in successfully');
        return $postData;
    }

    public function logout(){
        Auth::logout();
        // Redirect to login page for now
        return Redirect::intended('/')->with('success', 'Logged out successfully.');
    }
}