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
                <th scope="col">Report available?</th>
                <th scope="col">Report completed?</th>
                <th scope="col">Requisition updated on</th>
                <th scope="col">Modify Requisition</th>
                <th scope="col">Case finalized?</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($requisitions as $requisition)       
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
                            @if ($requisition->report != null)
                                yes
                            @else
                                no
                            @endif                        
                        </td>
                        <td>
                            @if ($requisition->report != null)
                                @if ($requisition->report->completed === 1)
                                   {{-- form to check requisition as updated --}}
                                <form action="/requisitions/{{$requisition->id}}" method="POST">
                                    @method('PATCH')
                                    @csrf
        <input type="checkbox" name="completed" {{$requisition->completed ? "checked" : ""}} onChange="this.form.submit()">
                                </form>
                                @else
                                    incomplete  
                                @endif   
                            @else
                                No
                            @endif
                        </td>
                        <td>{{$requisition->updated_at}}</td>
                        <td><a href="/requisitions/{{$requisition->id}}/edit" class="bg-success text-light">Modify</a></td>
                        <td>{{$requisition->completed ? "yes" : "no"}}</td>
                    </tr> 
                 @endforeach  
            </tbody>
          </table>
    @endsection