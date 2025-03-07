<?php

namespace App\Http\Controllers;

use App\Models\llibres;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            $llibres = llibres::findOrFail($id);
            return response()->json($llibres);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Llibre not found'], 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id , Request $request)
    {
        try {
            $llibres = llibres::findOrFail($id);
            $llibres->titol = $request->input('titol');
            $llibres->save();
            return response()->json($llibres);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Llibre not found'], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $llibres = llibres::findOrFail($id);
            $llibres->delete();
            return response()->json($llibres);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Llibre not found'], 404);
        }
    }

}
