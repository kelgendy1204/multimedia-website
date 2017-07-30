<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Category;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('IsEditorAtLeast')->only(['index', 'logout']);
        $this->middleware('IsSuperAdmin')->only(['addUser', 'storeUser']);
        $this->middleware('guest')->only(['login', 'authUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // get - /admin/mzk_admin_login
    public function login(Request $request)
    {
        return view('admin.adminlogin');
    }

    // post - /admin/mzk_admin_login
    public function authUser(Request $request)
    {
        $remember = $request->remember == 'on' ? true : false;
        // attempt to auth user
        if(!auth()->attempt(request(['name', 'password']), $remember)){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect('/admin/mzk_admin_panel');
    }

    // get - /admin/mzk_admin_panel
    public function index(Request $request)
    {
        return view('admin.adminpanel');
    }

    // post - /admin/mzk_admin_logout
    public function logout(Request $request)
    {
        auth()->logout();

        return redirect('/');
    }

    // get - /admin/mzk_admin_adduser
    public function addUser(Request $request)
    {

        $roles = Role::all();
        $categoriesRoles = Category::all();

        foreach ($categoriesRoles as $categoriesRole) {

            $isRoleNotExist = $roles->every(function ($role) use ($categoriesRole) {
                return $categoriesRole['name_en'] != $role->name;
            });

            if($isRoleNotExist) {
                $role = new Role;
                $role->name = $categoriesRole['name_en'];
                $role->save();
            }
        }

        $roles = Role::all();

        return view('admin.adminadduser', ['roles' => $roles]);
    }

    // post - /admin/mzk_admin_adduser
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
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($request->role_ids);

        //redirect
        return redirect('/admin/mzk_admin_panel');
    }

}
