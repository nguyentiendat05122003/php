<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    function login()
    {
        return view('public.login');
    }
    function register()
    {
        return view('public.register');
    }
    function postRegister(AuthRequest $req)
    {
        $dataInsert = [
            'name' => $req->name,
            'password' => Hash::make($req->password),
        ];
        $this->user->register($dataInsert);
        return redirect()->route('login');
    }
    function postLogin(Request $req)
    {
        $dataInsert = [
            'name' => $req->name,
            'password' => $req->password
        ];
        if ($this->user->login($dataInsert)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('msg', 'Login Fail');
        }
    }
    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    function index()
    {
        $users = $this->user->getAllUser();
        return view('admin.user.index', compact('users'));
    }
    function getAdd()
    {
        return view('admin.user.add');
    }
    function postAdd(AuthRequest $req)
    {
        $dataInsert = [
            'name' => $req->name,
            'password' => Hash::make($req->password),
            "level" => $req->level,
        ];
        $this->user->register($dataInsert);
        return redirect()->route('user.index')->with('msg', 'Add user success');
    }
    function delete($id)
    {
        $deleteStatus = $this->user->deleteUser($id);
        return redirect()->route('user.index')->with('msg', 'Delete user success');
    }
}
