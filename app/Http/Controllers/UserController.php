<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', compact('users'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:user,superadmin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        return redirect('login');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->route('products');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(UserCreateRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserCreateRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->id() && $user->role == 'superadmin') {
            return redirect()->route('users.index')->with('error', 'Anda tidak dapat menghapus Superadmin yang sedang digunakan!');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
