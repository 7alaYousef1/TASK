<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }
    public function create(Request $request)
    {
        
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        // DB::table('users')->insert(['name' => $user_name , 'email' => $user_email , 'password' => $user_password]);
        $user = new User;
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = bcrypt($user_password); 
        $user->save();
        return redirect()->back();
    }
    public function destroy(User $user , $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        // $users = DB::table('users')->get();
        $user = User::findOrFail($id);
        $users = User::all();
        return view('users', compact('user', 'users'));
    }
    public function update(Request $request)
    {
        // $id = $_POST['id'];
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // DB::table('users')->where('id', $id)->update(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password']]);

        $user = User::findOrFail($request->input('id'));

        
        $user->name = $request->input('name');
        $user->email = $request->input('email');

      
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return redirect('users');
    }
}
