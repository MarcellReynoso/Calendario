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
        $comunicados = Comunicado::orderBy('created_at', 'desc')->get();
        return view('comunicados.index', compact('comunicados'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
