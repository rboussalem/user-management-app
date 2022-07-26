<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('admin_permission', auth()->user());
        $users = User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('admin_permission', auth()->user());
        return view('users.create');
    }

    public function store(StoreUser $request)
    {
        $this->authorize('admin_permission', auth()->user());
        
        $user = new User;
        $user->name = $request->input('name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->cin = $request->input('cin');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        
        $request->session()->flash('status', 'Utilisateur Est Ajouté !');
        
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $this->authorize('admin_permission', auth()->user());
        return view('users.show', ['user' => User::findOrFail($id)]);
    }

    public function edit($id)
    {
        $this->authorize('admin_permission', auth()->user());
        return view('users.edit', ['user' => $user = User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        // Validation de la requete
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'required',
            'cin' => 'required',
            'date_of_birth' => 'required|before:today'
        ]);

        $this->authorize('admin_permission', auth()->user());
        
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->cin = $request->input('cin');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        
        $request->session()->flash('status', 'Utilisateur Est Modifié !');

        return redirect()->route('users.index');
        
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('admin_permission', auth()->user());
        $user = User::findOrFail($id);
        $user->delete();

        $request->session()->flash('status', 'Utilisateur Est Supprimé !');
        return redirect()->route('users.index');
    }

    public function sortbyrole($role){
        $this->authorize('admin_permission', auth()->user());

        if ($role == 'guest') {
            $users = User::where('role', 'guest')->paginate(10);
        } elseif($role == 'user') {
            $users = User::where('role', 'user')->paginate(10);
        } elseif($role == 'admin') {
            $users = User::where('role', 'admin')->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('users.index', ['users' => $users]);
    }

    public function roles(){
        $this->authorize('admin_permission', auth()->user());
        $users = User::paginate(10);
        return view('users.roles', ['users' => $users]);
    }
    
    public function updateroles(Request $request, $id, $role)
    {
        $this->authorize('admin_permission', auth()->user());
        $user = User::findOrFail($id);
        $user->role = $role;
        $user->save();

        $request->session()->flash('status', 'Rôle Est Changé !');
        return redirect()->route('users.roles');
    }
}
