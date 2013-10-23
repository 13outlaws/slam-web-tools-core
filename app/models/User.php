<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends ValidEloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    protected $fillable = array(
        'email',
        'password',
    );

    public $rules = array(
        'email' => 'required|email',
        'password' => 'required',
    );

    public function roles()
    {
        return $this->belongsToMany('Role');
    }

    public function userDetail(){
        return $this->hasOne('UserDetail');
    }

    public function userProfile(){
        return $this->hasOne('UserProfile');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('role', '=', $role)->first())
        {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        //TODO: modify roles table to have an is_admin column, which can then provide a simpler check here
        if ($this->roles()->where('is_admin', '=', true)->count() > 0)
        {
            return true;
        }
        return false;
    }

    public function isSiteAdmin()
    {
        if ($this->roles()->where('role', '=', 'SiteAdmin')->first())
        {
            return true;
        }
        return false;
    }

}