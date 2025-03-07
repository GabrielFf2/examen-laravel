<?php

namespace App\Http\Controllers;

use App\Models\llibres;
use Illuminate\Http\Request;

class LlibreController extends Controller
{
    public function index()
    {
        $llibres = llibres::all();
        return response()->json($llibres);
    }


    public function store(Request $request)
    {
        $llibres = new llibres();
        $llibres->titol = $request->input('titol');
        $llibres->save();
        return response()->json($llibres);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $llibres = llibres::findOrFail($id);
        return response()->json($llibres);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id , Request $request)
    {
        $llibres = llibres::findOrFail($id);
        $llibres->titol = $request->input('titol');
        $llibres->save();
        return response()->json($llibres);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $llibres = llibres::findOrFail($id);
        $llibres->delete();
        return response()->json($llibres);
    }
}
