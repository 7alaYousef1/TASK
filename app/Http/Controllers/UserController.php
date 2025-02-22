<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }
    public function create()
    {
        $user_name = $_POST['name'];
        DB::table('users')->insert(['name' => $user_name]);
        return redirect()->back();
    }
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }
    public function update()
    {
        $id = $_POST['id'];
        DB::table('users')->where('id', $id)->update(['name' => $_POST['name']]);
        return redirect('users');
    }
}
