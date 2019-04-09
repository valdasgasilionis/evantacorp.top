<?php

namespace App\Http\Controllers;

use App\Macro;
use App\Requisition;
use Illuminate\Http\Request;

class MacroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::all();

        return view('macros.index',compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $macros = Macro::where('technologis_id', auth()->id())->get();

        return view('macros.create', compact('macros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = request(['technologis_id','requisition_id']);
        $macro = Macro::create($request);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $macros = Macro::where('technologis_id', auth()->id())->get();

        return view('macros.show', compact('macros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Macro  $macro
     * @return \Illuminate\Http\Response
     */
    public function edit(Macro $macro)
    {
        $this->authorize('update', $macro);

        return view('macros.edit', compact('macro'));
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
        $this->authorize('update', $macro);
        $request = request(['macro']);
        $macro->update(['completed' => request()->has('completed')]);
        $macro->update($request);

        return redirect('/macros/create');
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
