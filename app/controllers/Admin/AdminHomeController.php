<?php namespace Admin;


class AdminHomeController extends \BaseController{

    public function index()
    {
        return \View::make('admin.admin_homepage');
    }

}