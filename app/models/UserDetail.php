<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gavster
 * Date: 20/10/13
 * Time: 06:19
 * To change this template use File | Settings | File Templates.
 */

class UserDetail extends ValidEloquent
{
    public function user(){
        return $this->belongsTo('User');
    }

    protected $fillable = array(
        'id',
        'user_id',
        'title',
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'country_name',
        'country_iso',
        'postcode',
        'telephone_home',
        'telephone_work',
        'telephone_mobile',
    );

    public $rules = array(
        'title' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'address_line_1' => 'required',
        'address_line_2' => 'required',
        'address_line_3' => 'required',
        'city' => 'required',
        'country_name' => 'required',
        'country_iso' => 'required',
        'postcode' => 'required',
        'telephone_home' => 'required',
        'telephone_work' => 'required',
        'telephone_mobile' => 'required',
    );
}