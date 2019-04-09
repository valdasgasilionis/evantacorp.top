@extends('layouts.app')
    @section('body')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">CASE</th>
            </tr>
        </thead>
        <tbody>
           <tr>
               <td>Report ID</td>
               <td>{{$report->id}}</td>
           </tr>
           <tr>
               <td>Requisition ID</td>
               <td>{{$report->requisition_id}}</td>
            </tr>
            <tr>
                <td>Pathologist_id</td>
                <td>{{$report->pathologist_id}}</td>
            </tr>
            <tr>
                <td>Patient ID</td>
                <td>{{$report->requisition->patient_id}}</td>
            </tr>
            <tr>
                <td>Patient first name</td>
                <td>{{$report->requisition->patient->first_name}}</td>
            </tr> 
            <tr>
                <td>Patient last name</td>
                <td>{{$report->requisition->patient->last_name}}</td>
            </tr>
            <tr>
                <td>Patient personal number</td>
                <td>{{$report->requisition->patient->personal_number}}</td>
            </tr>
            <tr>
                <td>Clinician ID</td>
                <td>{{$report->requisition->clinician_id}}</td>
            </tr>
            <tr>
                <td>Clinician name</td>
                <td>{{$report->requisition->user->name}}</td>
            </tr>
            <tr>
                <td>Pathologist name</td>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td>Requistion procedure</td>
                <td>{{$report->requisition->procedure}}</td>
            </tr>
            <tr>
                <td>Requistion description</td>
                <td>{{$report->requisition->description}}</td>
            </tr>
            <tr>
                <td>Requistion completed?</td>
                <td>{{$report->requisition->completed ? 'yes' : 'no'}}</td>
            </tr>
{{-- laboratory part of this report if initiated--}}
    @if ($report->requisition->macro != null)   
            <tr>
                <td>Macro registration date</td>
                <td>{{$report->requisition->macro->created_at}}</td>
            </tr>
            <tr>
                <td>Macro technologist</td>
                <td>{{$report->requisition->macro->technologist_id}}</td>
            </tr>
            <tr>
                <td>Macro description</td>
                <td>{{$report->requisition->macro->macro}}</td>
            </tr>
            <tr>
                <td>Macro completed></td>
                <td>{{$report->requisition->macro->completed ? "yes" : "no"}}</td>
            </tr>
    @endif        
{{-- end laboratory part of this report --}}
{{-- fill in pathology part of this report --}}
        <form action="/reports/{{$report->id}}" method="POST">
            @method('PATCH')
            @csrf
            <tr>
                <td>
                    Micro description
                </td>
                <td>
                    <textarea class="container-fluid"  name="micro" placeholder="Micro description">{{$report->micro}}</textarea>
                </td>
            </tr>
            <tr>
                <td>Conclusion</td>
                <td>
                    <textarea class="container-fluid" name="conclusion" placeholder="Conclusion">{{$report->conclusion}}</textarea>
                </td>
            </tr>
            <tr>
                <td>Note</td>
                <td>
                    <textarea class="container-fluid" name="note" placeholder="Note">{{$report->note}}</textarea>
                </td>
            </tr>
            <tr>
                <td>Report completed</td>
                <td>
                    {{$report->completed ? "yes" : "no"}}
                </td>
            </tr>
            <tr>
                <td>Sumbit report</td>
                <td>
                    <button type="submit" class="btn btn-primary">Update report</button>
                </td>
            </tr>
        </form>
{{-- end fill in pathology part of the report --}}
        </tbody>
      </table>
    @endsection