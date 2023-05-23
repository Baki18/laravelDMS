<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autori = Autor::all();
        return $autori;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autor = Autor::create([
            'ime'=>$request->ime,
            'struka'=>$request->struka,
            'brojDokumenata'=>$request->brojDokumenata
        ]);

        return response()->json($autor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show($autor_id)
    {
        $autor = Autor::find($autor_id);
        if(is_null($autor)){
            return response()->json('Not found',404);
        }
        else{
            return response()->json($autor);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $autor_id)
    {
        $autor = Autor::find($autor_id);
        if(is_null($autor)){
            return response()->json('Not found',404);
        }
        else{
            $autor->ime = $request->ime;
            $autor->struka = $request->struka;
            $autor->brojDokumenata = $request->brojDokumenata;
            $autor->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy($autor_id)
    {
        try{
            $autor = Autor::find($autor_id);
            if(is_null($autor)){
                return response()->json('Not found',404);
            }
            else{
                $autor->delete();
                return response()->json("Successfull");
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
