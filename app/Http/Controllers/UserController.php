<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
    // Validar los datos del formulario antes de almacenarlos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:8',
        'phone' => 'nullable|string', // Agregar validación para el número telefónico
    ]);

    // Crear el nuevo usuario
    $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'phone' => $request->input('phone'), // Asigna el valor del número telefónico al nuevo usuario
    ]);

    $user->save();

    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
    $user->roles()->sync($request->roles);

    // Validar los datos del formulario antes de actualizarlos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'phone' => 'nullable|string', // Agregar validación para el número telefónico
    ]);

    // Actualizar los datos del usuario
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone'); // Actualizar el número telefónico si se modificó

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }
    $user->save();

    return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }


    public function destroy(User $user)
    {
        // Eliminar el usuario
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
