<?php

class RolesTableSeeder
{
    public function run(){
        //clear all roles from table
        DB::table('roles')->delete();

        //seed with default roles
        Role::create(array(
            'role' => 'SiteAdmin'
        ));
        Role::create(array(
            'role' => 'Admin'
        ));
        Role::create(array(
            'role' => 'User'
        ));
    }
}