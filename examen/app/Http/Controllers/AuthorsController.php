<?php

namespace App\Http\Controllers;

use App\Models\authors;
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
        $author = authors::findOrFail($id);
        return response()->json($author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id , Request $request)
    {
        $author = authors::findOrFail($id);
        $author->nom = $request->input('nom');
        $author->save();
        return response()->json($author);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = authors::findOrFail($id);
        $author->delete();
        return response()->json($author);
    }

}
