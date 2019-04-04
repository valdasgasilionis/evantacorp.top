<?php

namespace App\Http\Controllers;

use App\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::orderBy('created_at', 'desc')->where('clinician_id', auth()->id())->get();
        return view('requisitions.index', compact('requisitions')); 
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
        $request = request(['patient_id','clinician_id']);
        
        $requisition = Requisition::create($request);

       /*  $requisitions = Requisition::where([            
            ['patient_id', $requisition['patient_id']],
            ['clinician_id', auth()->id()]
        ])->get()->last(); */

      return redirect('/requisitions/'.$requisition->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
       /*  return $requisition; */
       $this->authorize('view', $requisition);
        return view('requisitions.edit',compact('requisition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        /* return $request; */
        $requisition->update(request(['procedure','description']));

        return redirect('/requisitions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        $requisition->delete();
        return redirect('/requisitions');
    }
}
