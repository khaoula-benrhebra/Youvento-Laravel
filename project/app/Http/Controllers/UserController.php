<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
   /**
    * The index function retrieves all users from the database and passes them to the 'users.index'
    * view.
    * 
    * @return The `index` method is returning a view called `users.index` with the users data passed as
    * a variable using the `compact` function.
    */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
}