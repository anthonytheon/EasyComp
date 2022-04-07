<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Major;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('admin.user-management.index', compact('users'));
    }

    
    public function create()
    {
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('admin.user-management.crud.create', compact('faculties', 'majors'));
    }

    
    public function store(Request $request)
    {
        //dd($request);
        $data = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'id_number' => 'required',
            'gender' => 'required',
            'year_start' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'major' => 'required',
        ]);

        $role_id = 2;
        $data['password'] = Hash::make($data['password']);
        // name email password role_id id_number gender year_start university faculty major

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $role_id,
            'id_number' => $request->input('id_number'),
            'gender' => $request->input('gender'),
            'year_start' => $request->input('year_start'),
            'university' => $request->input('university'),
            'faculty' => $request->input('faculty'),
            'major' => $request->input('major'),

        ]);

        return redirect()->route('user-management.index')->with('success', 'User created !');
    }

    
    public function edit(User $user)
    {
        $faculties = Faculty::all();
        $majors = Major::all();
        return view('admin.user-management.crud.edit', compact('user', 'faculties', 'majors'));
    }

    public function show(User $user)
    {
        return view('admin.user-management.crud.show', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'id_number' => 'required',
            'gender' => 'required',
            'year_start' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'major' => 'required',
        ]);

        $user->update($data);
  
        return redirect()->route('user-management.index')->with('success', 'User updated successfully');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect()->route('user-management.index')->with('success', 'User deleted successfully');
    }
}
