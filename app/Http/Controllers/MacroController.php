<?php

namespace App\Http\Controllers;

use App\Macro;
use Illuminate\Http\Request;

class MacroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('macros.index');
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
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function show(Macro $macro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function edit(Macro $macro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Macro $macro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Macro $macro)
    {
        //
    }
}
