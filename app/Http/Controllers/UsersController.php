<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // private static function getData()
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'name' => 'mawada',
    //             'username' => 'bada',
    //             'password' => '123456',
    //             'email' => 'mm@gmail.com',
    //             'permission' => 'Admin '
    //         ],
    //         [
    //             'id' => 2,
    //             'name' => 'Selwan',
    //             'username' => 'bada',
    //             'password' => '000000',
    //             'email' => 'ss@gmail.com',
    //             'permission' => 'Admin '
    //         ],
    //         [
    //             'id' => 3,
    //             'name' => 'Maha',
    //             'username' => 'bada',
    //             'password' => '102030',
    //             'email' => 'hh@gmail.com',
    //             'permission' => 'User '
    //         ],
    //     ];
    // }


    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'user_fullname' => 'required',
            // 'user_username' => 'required',
            'user_pass' => 'required',
            // 'user_pass_check' => 'required',

        ]);

        $user = new user();
        $user->name = strip_tags($request->input('user_fullname'));
        // $user->username = strip_tags($request->input('user_username'));
        $user->email = strip_tags($request->input('user_email'));
        $user->password = strip_tags($request->input('user_pass'));
        // $user->permission = strip_tags($request->input('user_per'));
        // $user->pic = strip_tags($request->input('user_pic'));

        $user->save();
        return redirect()->route('users.index');
    }


    public function show($id)
    {

        $index = User::findOrFail($id);
        return view('users.show', ['user' => $index]);


        // $users = self::getData();
        // $index = array_search($id, array_column($users, 'id'));
        // if ($index === false) {
        //     abort(404);
        // }
        // return view('users.show', ['user' => $users[$index]]);
    }


    public function edit($id)
    {
        $index = User::FindOrFail($id);
        return view('users.edit', ['user' => User::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'user_fullname' => 'required',
            'user_username' => 'required',
            'user_pass' => 'required',

        ]);

        $to_update = User::findOrFail($id);
        $to_update->name = strip_tags($request->input('user_fullname'));
        $to_update->username = strip_tags($request->input('user_username'));
        $to_update->email = strip_tags($request->input('user_email'));
        $to_update->password = strip_tags($request->input('user_pass'));
        $to_update->permission = strip_tags($request->input('user_per'));
        $to_update->pic = strip_tags($request->input('user_pic'));

        $to_update->save();
        return redirect()->route('users.show', $id);
    }


    public function destroy($id)
    {
        $to_delete = User::findOrFail($id);
        $to_delete->delete();
        return redirect()->route('users.index');
    }
}
