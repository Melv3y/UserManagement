<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

Route::get('/', function () {
    if (session()->has('username')) {
        return redirect('homepage');
    }
    return view('login');
});

Route::post('homepage', [Users::class, 'userLogin']);
Route::middleware('auth.user')->get('homepage', function() {
    $collection = App\Models\User::all();
    return view('homepage', ['collection' => $collection]);
});

Route::view('noaccess', 'noaccess');

Route::get('/logout', function () {
    if (session()->has('username')) {
        session()->pull('username');
    }
    return redirect('/');
});

Route::post('register', [Users::class, 'registerUser']);
Route::get('view/{id}', [Users::class, 'showEditData']);
Route::get('delete/{id}', [Users::class, 'deleteUser']);
Route::post('edit', [Users::class, 'editUser']);
