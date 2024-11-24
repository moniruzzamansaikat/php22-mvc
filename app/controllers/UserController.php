<?php

namespace App\Controllers;

use Php22\Controllers\BaseController;
use Php22\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        $users = db()->table('users')
            ->select(['id', 'username'])
            ->get();

        $this->render('users/index', [
            'users' => $users,
            'appName' => 'User Management'
        ]);
    }

    public function getJson()
    {
        $users = db()->tbl('users')->select()->get();
        
        return $this->json($users);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        db()->tbl('users')->insert([
            'username' => $data['username'],
            'password' => hash_password($data['password']),
        ]);

        flash()->set('success', 'User added successfully!');
        $this->redirect('/users');
    }
}
