<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('IsSuperAdmin')->only(['addUser', 'storeUser', 'showUsers', 'editUser', 'updateUser', 'deleteUser']);
        $this->middleware('guest')->only(['login', 'authUser']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    private function loginUserById($request)
    {
        $remember = $request->remember == 'on' ? true : false;
        $name = $request->name;
        $password = $request->password;

        $user = User::where('name', $name)->first();

        if (Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id, $remember);
            return true;
        }
        return false;
    }

    private function loginUserByAttempt($request)
    {
        $remember = $request->remember == 'on' ? true : false;
        $name = $request->name;
        $password = $request->password;

        // attempt to auth user
        if(auth()->attempt(['name' => $name, 'password' => $password], $remember)) {
            return true;
        }

        return false;
    }

    private function getAllRoles()
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

        return $roles;
    }

    // get - /admin/mzk_admin_login
    public function login(Request $request)
    {
        return view('admin.adminlogin');
    }

    // post - /admin/mzk_admin_login
    public function authUser(Request $request)
    {

        if(!$this->loginUserById($request)) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect()->action(
            'AdminController@index'
        );

    }


    public function showUsers()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function editUser($user)
    {
        $roles = $this->getAllRoles();
        $user = User::find($user);
        return view('admin.users.create', ['user' => $user, 'roles' => $roles]);
    }

    public function updateUser($user)
    {
        $user = User::find($user);
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
        ]);

        $user->name = request()->name;
        $user->email = request()->email;
        if(request()->password) {
            $user->password = bcrypt(request()->password);
        }
        $user->save();
        $user->roles()->detach();
        $user->roles()->attach(request()->role_ids);
        return redirect()->action(
            'AdminController@showUsers'
        );
    }

    public function deleteUser($user)
    {
        if($user == request()->user()->id){
            return redirect()->action(
                'AdminController@showUsers'
            );
        }

        $user = User::find($user);
        $user->roles()->detach();
        $user->delete();
        return redirect()->action(
            'AdminController@showUsers'
        );
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

        return redirect()->action(
            'PostsController@index'
        );
    }

    // get - /admin/mzk_admin_adduser
    public function addUser(Request $request)
    {
        $roles = $this->getAllRoles();
        return view('admin.users.create', ['roles' => $roles]);
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
        return redirect()->action(
            'AdminController@index'
        );
    }

}
