<?php

class AccountController extends BaseController{

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $page_title = 'Account Dashboard';
        return View::make('account.index', array('user' => $user, 'pageTitle' => $page_title));
    }

    public function create()
    {
        $page_title = 'Create Account';
        return View::make('account.create', array('pageTitle' => $page_title));
    }

    public function store()
    {
        //get posted form data
        $postData = Input::all();
        $newAccountData = new ValidationModels\CreateUserValidationModel($postData);
        //validate form data
        if (!$newAccountData->validate($postData)){
              return \Redirect::back()
                  ->withErrors($newAccountData->errors())
                ->withInput();
        }
        //create new user
        $newUser = new User(array('email' => $newAccountData->email,'password' => Hash::make($newAccountData->password)));
        $newUser->save();
        $userProfile = new UserProfile();
        $userProfile->user_id = $newUser->id;
        $userProfile->save();
        $userDetails = new UserDetails();
        $userDetails->user_id = $newUser->id;
        $userDetails->save();
        $newUser->roles()->attach($newUser->id, array('role_id' => Role::where('role', '=', 'User')->first()->id));
        //attempt to log user in
        if (!Auth::attempt(array('email' => $newAccountData->email, 'password' => $newAccountData->password))){
            return Redirect::back()
                ->withErrors(array('login_failed' => 'Sorry, something went wrong and the site could not log you in.'))
                ->withInput();
        }
        return Redirect::route('account.index')->with('success', 'Account created successfully');
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        if (!$user->userProfile)
        {
            $userProfile = new UserProfile();
            $userProfile->user_id = $user->id;
            $userProfile->save();
        }
        if (!$user->userDetail)
        {
            $userDetails = new UserDetail();
            $userDetails->user_id = $user->id;
            $userDetails->save();
        }
        if ($user->roles()->count() == 0)
        {
            $user->roles()->attach($user->id, array('role_id' => Role::where('role', '=', 'User')->first()->id));
        }

        $pageTitle = 'Edit Account Details';
        return View::make('account.edit', array('user' => $user,'pageTitle' => $pageTitle));
    }

    public function update()
    {
        $postData = Input::all();
        $user = User::find($postData['id']);
        $userVal = new ValidationModels\UpdateUserValidationModel($postData);
        $userVal->id = $user->id;
        $userVal->fill($postData['userDetail']);
        $userVal->fill($postData['userProfile']);
        $userVal->rules['email'] = 'required|email|unique:users,email,' . $user->id;
        if (!$userVal->validate((array)$userVal['attributes'], $user->id)){
            var_dump($userVal->errors());
            return \Redirect::back()
                ->withErrors($userVal->errors())
                ->withInput();
        }

        $user->fill($postData);
        if (!$user->save()){
            return Redirect::back()
                ->withErrors(array('login_failed' => 'Sorry, something went wrong and your profile could not be saved.'))
                ->withInput();
        }

        $userDetails = $user->userDetail;
        $userDetails->fill($postData['userDetail']);
        if (!$userDetails->save()){
            return Redirect::back()
                ->withErrors(array('login_failed' => 'Sorry, something went wrong and your profile could not be saved.'))
                ->withInput();
        }

        $userProfile = $user->userProfile;
        $userProfile->fill($postData['userProfile']);
        if (!$userProfile->save()){
            return Redirect::back()
                ->withErrors(array('login_failed' => 'Sorry, something went wrong and your profile could not be saved.'))
                ->withInput();
        }

        return Redirect::route('account.index')->with('success', 'Account details updated successfully');
    }

    public static  function createProfile($id)
    {
        $userProfile = new UserProfile(array('user_id', $id));
        if ($userProfile->save())
        {
            return true;
        }
        return false;
    }

    public function createDetails($id)
    {
        $userDetails = new UserDetails(array('user_id', $id));
        if ($userDetails->save())
        {
            return true;
        }
        return false;
    }

}