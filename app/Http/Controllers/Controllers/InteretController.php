<?php

namespace App\Http\Controllers;

use App\Models\Interet;
use Illuminate\Http\Request;

class InteretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $interets = Interet::all();
        return response()->json($interets);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function show(Interet $interet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function edit(Interet $interet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interet $interet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interet $interet)
    {
        //
    }
}
