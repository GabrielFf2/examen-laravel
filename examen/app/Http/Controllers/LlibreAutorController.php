<?php

namespace App\Http\Controllers;
use App\Models\authors;
use App\Models\llibres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LlibreAutorController
{

    public function assign($idLlibre , $idAutor)
    {
        $llibresAuthors = DB::table('author_llibre')->insert([
            'llibre_id' => $idLlibre,
            'author_id' => $idAutor
        ]);
        return response()->json($llibresAuthors);
    }


    /**
     * Display the specified resource.
     */
    public function unassign($idLlibre , $idAutor)
    {
        $llibresAuthors = DB::table('author_llibre')->where(
            'llibre_id', $idLlibre
        )->where('author_id', $idAutor)->delete();
        return response()->json($llibresAuthors);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getAutors($idLlibre )
    {
        $llibresAuthors = DB::table('author_llibre')->where('llibre_id', $idLlibre)->get();
        $authors = authors::all()->whereIn('id', $llibresAuthors->pluck('author_id'));
        return response()->json($authors);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function getLlibres($idAuthor)
    {

        $llibresAuthors = DB::table('author_llibre')->where('author_id', $idAuthor)->get();
        $llibres = llibres::all()->where('id', $llibresAuthors->pluck('llibre_id'));
        return response()->json($llibres);

    }
}
