<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('settings');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
                    $request->validate([
                     'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                     'title' => 'required|string|max:50',
                     'description' => 'required|string|max:255',
                      ]);
                    
                       // Creazione del record nel database
                     $Promotion = Promotion::create([
                      'img' => $request->file('img')->store('public/img') ,
                      'title' => $request->title,
                      'description' => $request->description,
                    ]);


                    return redirect()->route('promotions')->with('message-success', 'Promozione aggiunta con successo!');
                   
                
    }

    /**
     * Display the specified resource.
     */
    public function show()
    { 
        $promotions = Promotion::orderBy('created_at', 'desc')->get(); // Aggiungi questa riga
        
        return view('promotions', ['promotions' => $promotions]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $promotion = Promotion::findOrFail($id);

        return view('edit', compact('promotion'));
        
        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'title' => 'required|string|max:50', 
            'description' => 'required|string|max:255', 
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            'img' => $request->file('img')->store('public/img'),
            'title' => $request->title,
            'description' => $request->description,
          ]);

          return redirect(route('promotions'))->with('message-modify', 'promozione aggiornata con successo!!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id); 
        $promotion->delete();

       return redirect(route('promotions'))->with('message-delete', 'promozione eliminata!!');
    }
}