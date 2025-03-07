<?php

namespace App\Http\Controllers;

use App\Models\authors;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $authors = authors::all();
        return response()->json($authors);
    }


    public function store(Request $request)
    {
        $author = new authors();
        $author->nom = $request->input('nom');
        $author->save();
        return response()->json($author);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $author = authors::findOrFail($id);
            return response()->json($author);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id , Request $request)
    {
        try {
            $author = authors::findOrFail($id);
            $author->nom = $request->input('nom');
            $author->save();
            return response()->json($author);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $author = authors::findOrFail($id);
            $author->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Author not found'], 404);
        }
    }

}
