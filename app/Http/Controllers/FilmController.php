<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::latest()->paginate(5);
    
        return view('films.index',compact('films'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
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
            'Title' => 'required',
            'Dirnr' => 'required',
            'Jaar' => 'required',
            'Genre' => 'nullable',
            'Tijdsduur' => 'required',
        ]);
    
        Film::create($request->all());
     
        return redirect()->route('films.index')
                        ->with('success','Film created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $film = Film::find($id);
        
        return view('films.show',compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);

        return view('films.edit',compact('film'));
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
        
        $film = Film::find($id);
        
        $request->validate([
            'Title' => 'required',
            'Dirnr' => 'required',
            'Jaar' => 'required',
            'Genre' => 'nullable',
            'Tijdsduur' => 'required',
        ]);
    
        $film->update($request->all());
    
        return redirect()->route('films.index')
                        ->with('success','Film updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film= Film::find($id);
        $film->delete();
    
        return redirect()->route('films.index')
                        ->with('success','Film deleted successfully');
    }
}
