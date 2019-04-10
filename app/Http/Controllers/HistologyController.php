<?php

namespace App\Http\Controllers;

use App\Histology;
use App\Requisition;
use Illuminate\Http\Request;

class HistologyController extends Controller
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
        $requisitions = Requisition::orderBy('created_at', 'desc')->get();
        return view('histologies.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $histologies = Histology::where('technologist_id', auth()->id())->get();

        return view('histologies.create', compact('histologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = request(['requisition_id','technologist_id']);

        $histology = Histology::create($request);
        
        return redirect('/histologies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Histology  $histology
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $histologies = Histology::where('technologist_id', auth()->id())->get();

        return view('histologies.show', compact('histologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Histology  $histology
     * @return \Illuminate\Http\Response
     */
    public function edit(Histology $histology)
    {
        $this->authorize('update', $histology);
        return view('histologies.edit', compact('histology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Histology  $histology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histology $histology)
    {
        $request = request(['slides']);
        $histology->update(['completed' => request()->has('completed')]);
        $histology->update($request);
        return redirect('/histologies/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Histology  $histology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histology $histology)
    {
        //
    }
}
