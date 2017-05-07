<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('IsAdmin')->except(['login', 'authUser']);
        $this->middleware('IsSuperAdmin')->only(['addUser', 'storeUser']);
        $this->middleware('guest')->only(['login', 'authUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // get - /mzk_admin_panel
    public function index(Request $request)
    {
        return view('admin.adminpanel');
    }

    // get - /mzk_admin_login
    public function login(Request $request)
    {
        return view('admin.adminlogin');
    }

    // post - /mzk_admin_login
    public function authUser(Request $request)
    {
        // attempt to auth user
        if(!auth()->attempt(request(['name', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect('/mzk_admin_panel');
    }

    // get - /mzk_admin_adduser
    public function addUser(Request $request)
    {
        return view('admin.adminadduser');
    }

    // post - /mzk_admin_adduser
    public function storeUser(Request $request)
    {
        //validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        //create and save
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->save();

        //sign in
        auth()->login($user);

        //redirect
        return redirect('/mzk_admin_panel');
    }

    // post - /mzk_admin_logout
    public function logout(Request $request)
    {
        auth()->logout();

        return redirect('/');
    }
}
