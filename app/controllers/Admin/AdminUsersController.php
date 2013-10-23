<?php namespace Admin;


class AdminUsersController extends \BaseController{

    public function index()
    {
        return \View::make('admin.users.index');
    }

    public function show()
    {
        return \View::make('admin.users.show');
    }

    public function edit()
    {
        return \View::make('admin.users.edit');
    }

    public function create()
    {
        return \View::make('admin.users.create');
    }

}