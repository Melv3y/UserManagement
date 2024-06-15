<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    function userLogin(Request $req){
        $req->validate([
            'username'=>'required | max:10',
            'userpassword'=>'required | max:15'
        ]);

        $collection = User::all();

        $data = $req->input();
        $req->session()->put('username', $data['username']);

        return view('homepage', ['collection' => $collection]);
    }

    function registerUser(Request $req){
        $user = new User;
        $user->firstName = $req->firstName;
        $user->lastName = $req->lastName;
        $user->gender = $req->gender;
        $user->age = $req->age;
        $user->contactNumber = $req->contactNumber;
        $user->reg_userName = $req->reg_userName;
        $user->reg_password = $req->reg_password;
        $user->save();
        return redirect('')->with('success', 'User registered successfully!');
    }

    function deleteUser($id)
    {
        $data = User::find($id);
        $data->delete();
        $collection = User::all();
        return redirect('homepage')->with('success', 'User deleted successfully!');
    }

    function showEditData($id)
    {
        $data= User::find($id);
        return view('edit',['data'=>$data]);
    }

    function editUser(Request $req)
    {
        $data = User::find($req->id);
        $data->firstName=$req->firstName;
        $data->lastName=$req->lastName;
        $data->gender=$req->gender;
        $data->age=$req->age;
        $data->reg_userName=$req->reg_userName;
        $data->reg_Password=$req->reg_Password;
        $data->save();
        return redirect('homepage');
    }
}
