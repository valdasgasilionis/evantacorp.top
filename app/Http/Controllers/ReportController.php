<?php

namespace App\Http\Controllers;

use App\Report;
use App\Requisition;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public $requisitions;

    public function __costruct()
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
        return view('reports.index',compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Report::class);

        $reports = Report::orderBy('created_at', 'desc')->where('pathologist_id', auth()->id())->get();     

        return view('reports.create', compact('reports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Report::class);
        $request = request(['requisition_id','pathologist_id']);
        $report = Report::create($request);
        return redirect('reports/'.$report->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $this->authorize('update', $report);
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $this->authorize('update', $report);
        
        $request = request([
            'micro', 'conclusion', 'note'
        ]);

        $report->update($request);

        $report->update(['completed' => request()->has('completed')]);

        return redirect('/reports/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
