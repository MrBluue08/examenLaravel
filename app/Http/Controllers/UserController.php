<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function main(){
        return view("main");
    }
    public function login($fail = null){
        $error = $fail;
        return view("login", compact("error"));
    }

    public function auth(){
        request()->validate([
            'nick' => 'required',
            'passwd' => 'required',
        ]);
        $nick = request()->input('nick');
        $passwd = request()->input('passwd');
        $user = User::where('nick', $nick)->first();
        if($user && Hash::check($passwd, $user->password)) {
            Auth::guard('user')->login($user);
            session(['nick' => $user->nick]);
            return redirect()->route('main');
        }elseif(!$user){
            $error = "nick";
            return redirect()->route('login', compact("error"));
        }else{
            $error = "passwd";
            return redirect()->route('login', compact("error"));
        }
    }

    
    public function logout(Request $request){
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
