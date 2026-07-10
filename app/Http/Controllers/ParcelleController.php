<?php

namespace App\Http\Controllers;

use App\Models\Parcelle;
use Illuminate\Http\Request;

class ParcelleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    
       public function index()
{
    $parcelles = Parcelle::all();
    return view('parcelles.index', compact('parcelles'));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('parcelles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'culture' => 'required',
        'superficie' => 'required|numeric',
        'date_plantation' => 'required|date',
        'statut' => 'required',
    ]);

    Parcelle::create([
        'nom' => $request->nom,
        'culture' => $request->culture,
        'superficie' => $request->superficie,
        'date_plantation' => $request->date_plantation,
        'statut' => $request->statut,
    ]);

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle ajoutée avec succès.');
}
    
    

    /**
     * Display the specified resource.
     */
    public function show(Parcelle $parcelle)
    {
         return view('parcelles.show', compact('parcelle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcelle $parcelle)
    {
         return view('parcelles.edit', compact('parcelle'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Parcelle $parcelle)
{
    $request->validate([
        'nom' => 'required',
        'culture' => 'required',
        'superficie' => 'required|numeric',
        'date_plantation' => 'required|date',
        'statut' => 'required',
    ]);

    $parcelle->update([
        'nom' => $request->nom,
        'culture' => $request->culture,
        'superficie' => $request->superficie,
        'date_plantation' => $request->date_plantation,
        'statut' => $request->statut,
    ]);

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle modifiée avec succès.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcelle $parcelle)
    {
        $parcelle->delete();

    return redirect()->route('parcelles.index')
                     ->with('success', 'Parcelle supprimée avec succès.');
    }
}
