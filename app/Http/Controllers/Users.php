<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    function userLogin(Request $req){
        $req->validate([
            'username' => 'required|max:10',
            'userpassword' => 'required|max:15'
        ]);

        $user = User::where('reg_userName', $req->input('username'))->first();

        $inputUsername = $req->input('username');
        $inputPassword = $req->input('userpassword');

        // Check if the input username and password match the admin credentials
        if ($inputUsername === 'admin' && $inputPassword === 'admin') {
            $req->session()->put('role', 'admin');
            $req->session()->put('username', 'admin');
            return redirect('homepage');
        }

        if ($user && $user->reg_Password === $req->input('userpassword')) {
            $req->session()->put('username', $user->reg_userName);
            if ($user->role === 'admin') {
                $req->session()->put('role', $user->role);
                $req->session()->put('id', $user->id);
                return redirect('homepage');
            } else {
                $req->session()->put('role', $user->role);
                $req->session()->put('id', $user->id);
                return redirect('view/'.$user->id);
            }
        } else {
            return back()->withErrors(['username' => 'Invalid username or password.']);
        }
    }

    function registerUser(Request $req){
        $req->validate([
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'gender' => 'required',
            'age' => 'required|integer',
            'contactNumber' => 'required|max:12',
            'reg_userName' => 'required|max:30|unique:users,reg_userName',
            'reg_Password' => 'required|min:8'
        ]);

        $user = new User;
        $user->firstName = $req->firstName;
        $user->lastName = $req->lastName;
        $user->gender = $req->gender;
        $user->age = $req->age;
        $user->contactNumber = $req->contactNumber;
        if ($req->session()->has('username')) {
            $user->role = $req->role;
        } else {
            $user->role = "user";
        }
        $user->reg_userName = $req->reg_userName;
        $user->reg_Password = $req->reg_Password; 
        $user->save();

        if ($req->session()->has('username')) {
            return redirect('homepage')->with('success', 'User registered successfully!');
        } else {
            return redirect('/')->with('success', 'User registered successfully! Please log in.');
        }
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
        return view('view',['data'=>$data]);
    }

    function editUser(Request $req)
    {
        $data = User::find($req->id);
        $data->firstName = $req->firstName;
        $data->lastName = $req->lastName;
        $data->gender = $req->gender;
        $data->age = $req->age;
        $data->contactNumber = $req->contactNumber;
        
        if ($req->session()->get('role') == "admin") {
            $data->role = $req->role;
        } else {
            $data->role = "user";
        }

        $data->reg_userName = $req->reg_userName;
        $data->reg_Password = $req->reg_Password;
        $data->save();
        
        return redirect('view/' . $data->id)->with('success', 'User information updated successfully!');
    }
}
