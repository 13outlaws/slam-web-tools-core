<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gavster
 * Date: 19/10/13
 * Time: 03:49
 * To change this template use File | Settings | File Templates.
 */

class UserProfile extends ValidEloquent{

    public function user(){
        return $this->belongsTo('User');
    }

    protected $fillable = array(
        'user_id',
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
        'bio' => 'required',
        'signature' => 'required',
        'website_url' => 'required|url',
        'facebook_url' => 'required|url',
        'twitter_url' => 'required|url',
        'linkedin_url' => 'required|url',
        'instagram_url' => 'required|url',
        'google_plus_url' => 'required|url',
    );

}