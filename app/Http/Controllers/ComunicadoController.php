<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunicado;
use Illuminate\Support\Facades\Auth;

class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $comunicados = Comunicado::orderBy('created_at', 'desc')->get();
        return view('comunicados.index', compact('comunicados','user'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comunicados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);
    
        $comunicado = new Comunicado([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);
    
        // Asignar el ID del usuario actual al comunicado
        $comunicado->user_id = Auth::id();
    
        $comunicado->save();
    
        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comunicado $comunicado)
    {
        return view('comunicados.show', compact('comunicado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comunicado $comunicado)
    {
        return view('comunicados.edit', compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comunicado $comunicado)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Actualizar los datos del usuario
        $comunicado->titulo = $request->input('titulo');
        $comunicado->contenido = $request->input('contenido');
        
        $comunicado->save();

        // Actualizar roles y permisos si estás utilizando Spatie Laravel Permission
        // ...

        return redirect()->route('admin.comunicados')->with('success', 'Comunicado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comunicado $comunicado)
    {
        $comunicado->delete();
        return redirect()->route('admin.comunicados')->with('success', 'Comunicado eliminado exitosamente.');
    }
}
