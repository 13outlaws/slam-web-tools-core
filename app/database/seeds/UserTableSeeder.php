<?php

class UserTableSeeder
{
    public function run(){
        //clear all roles from table
        DB::table('users')->delete();

        //seed with default roles
        User::create(array(
            'email' => 'gavslater@gmail.com',
            'password' => Hash::make('outlaws03')
        ));
    }
}