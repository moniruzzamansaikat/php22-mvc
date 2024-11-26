<?php

namespace App\Controllers;

use Php22\Controllers\BaseController;
use Php22\Http\Request;
use Php22\Utils\Validator;

class UserController extends BaseController
{
    public function testRoute(Validator $validator, $id, $another)
    {
        debugPretty("", $id, $another);
        
        // debug($id, $another);
    }

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

    public function deleteUser($id)
    {
        db()->tbl('users')->where('id', '=', $id)->delete();

        flash()->set('success', 'User deleted');

        $this->redirect('/users');
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
