<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.admin.users-management.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.users-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'access' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = rand(111111, 999999);

        if($request->hasFile('avatar')){
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }else{
            $avatarPath = 'storage/default/user.png';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'otp' => $otp,
            'phone' => $data['phone'],
            'access' => $data['access'],
            'avatar' => $avatarPath,
            'password' => bcrypt($data['password']),
        ]);

        if($data['role'] == 'admin'){
            $user->assignRole('admin');
        }elseif($data['role'] == 'staff'){
            $user->assignRole('staff');
        }elseif($data['role'] == 'user'){
            $user->assignRole('user');
        }

        return redirect()->route('dashboard.users_management.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('dashboard.admin.users-management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'access' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        if($request->hasFile('avatar')){
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $avatarPath]);
        }

        $user->update($data);

        if($data['role'] == 'admin'){
            $user->syncRoles(['admin']);
        } elseif($data['role'] == 'staff'){
            $user->syncRoles(['staff']);
        } elseif($data['role'] == 'user'){
            $user->syncRoles(['user']);
        }

        return redirect()->route('dashboard.users_management.index');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard.users_management.index')->with('success', 'User deleted successfully');
    }
}
