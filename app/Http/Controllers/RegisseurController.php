<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regisseur;

class RegisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regisseurs = Regisseur::latest()->paginate(5);
    
        return view('regisseurs.index',compact('regisseurs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Voornaam' => 'required',
            'Achternaam' => 'required',
        ]);
    
        Regisseur::create($request->all());
     
        return redirect()->route('regisseurs.index')
                        ->with('success','regisseur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $regisseur = Regisseur::find($id);
        
        return view('regisseurs.show',compact('regisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regisseur = Regisseur::find($id);

        return view('regisseurs.edit',compact('regisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $regisseur = Regisseur::find($id);
        
        $request->validate([
            'Voornaam' => 'required',
            'Achternaam' => 'required',
        ]);
    
        $regisseur->update($request->all());
    
        return redirect()->route('regisseurs.index')
                        ->with('success','regisseur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regisseur= Regisseur::find($id);
        $regisseur->delete();
    
        return redirect()->route('regisseurs.index')
                        ->with('success','regisseur deleted successfully');
    }
}
