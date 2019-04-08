@extends('layouts.app')
    @section('body')
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Requisition ID</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Patient name</th>
                <th scope="col">Patient personal Number</th>
                <th scope="col">Clinician ID</th>
                <th scope="col">Clinician name</th>
                <th scope="col">Requisition created on</th>
                <th scope="col">Requisition title</th>
                <th scope="col">Requisition description</th>
                <th scope="col">Initialize report?</th>
                <th scope="col">Requisition updated on</th>
                <th scope="col">Report</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($requisitions as $requisition) 
    {{-- only display requisitions that don't have patholgy report initiated --}} 
    @if ($requisition->report === null)         
                    <tr>
                        <th scope="row">{{$requisition->id}}</th>
                        <td>{{$requisition->patient_id}}</td>
                        <td>{{$requisition->patient->first_name}}, {{$requisition->patient->last_name}}</td>
                        <td>{{$requisition->patient->personal_number}}</td>
                        <td>{{$requisition->clinician_id}}</td>
                        <td>{{$requisition->user->name}}</td>
                        <td>{{$requisition->created_at}}</td>
                        <td>{{$requisition->procedure}}</td>
                        <td>{{$requisition->description}}</td>
                        <td>
                               <form action="/reports" method="POST">
                                    @csrf
                                    <input type="hidden" name="requisition_id" value="{{$requisition->id}}">
                                    <input type="hidden" name="pathologist_id" value="{{auth()->id()}}">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" onchange="this.form.Submit()">
                                            Create report
                                        </button>
                                    </div>
                               </form>                    
                        </td>
                        <td>{{$requisition->updated_at}}</td>
                        <td>
                            @if ($requisition->report != null)                 
                                <button type="submit" class="btn btn-primary">
                                    <a href="/reports/{{$requisition->report->id}}/edit">
                                        Report
                                    </a>
                                </button>
                            @endif
                        </td>
                    </tr> 
        @endif             
                 @endforeach  
                
            </tbody>
          </table>
    @endsection