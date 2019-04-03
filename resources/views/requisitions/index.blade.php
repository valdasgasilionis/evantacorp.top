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
                <th scope="col">Requisition updated on</th>
                <th scope="col">Modify Requisition</th>
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
                        <td>{{$requisition->completed ? "yes" : "no"}}</td>
                        <td>{{$requisition->updated_at}}</td>
                        <td><a href="/requisitions/{{$requisition->id}}/edit">
                                <button type="submit" class="btn btn-primary">Modify Requisition</button>
                            </a>
                        </td>
                    </tr> 
                 @endforeach  
            </tbody>
          </table>
    @endsection