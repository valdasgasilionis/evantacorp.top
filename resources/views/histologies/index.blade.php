@extends('layouts.app')
    @section('body')
    <div class="container-fluid bg-warning text-center"><a href="histologies/create">List of YOUR histologies</a></div>
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
                <th scope="col">Initialize histology?</th>
                <th scope="col">Requisition updated on</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($requisitions as $requisition) 
    {{-- only display requisitions that don't have histology report initiated --}} 
    @if ($requisition->histology === null)         
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
                               <form action="/histologies" method="POST">
                                    @csrf
                                    <input type="hidden" name="requisition_id" value="{{$requisition->id}}">
                                    <input type="hidden" name="technologist_id" value="{{auth()->id()}}">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" onchange="this.form.Submit()">
                                            Create histology
                                        </button>
                                    </div>
                               </form>                    
                        </td>
                        <td>{{$requisition->updated_at}}</td>
                    </tr> 
        @endif             
                 @endforeach  
                
            </tbody>
          </table>
    @endsection