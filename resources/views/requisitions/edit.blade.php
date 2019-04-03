@extends('layouts.app')
    @section('body')
    <div class="jumbotron text-center text-uppercase text-danger bg-success">
            <div class="text-center"><h2>Edit requisition<h2></div>
            <div class="text-center">Requisition id number: {{$requisition->id}}</div>
            <div class="text-center">Patient id number: {{$requisition->patient_id}}</div>
            <div class="text-center">
                Patient: {{$requisition->patient->first_name}},
                         {{$requisition->patient->last_name}},
                         {{$requisition->patient->personal_number}}        
            </div>
            <div class="text-center">Clinician: Id number - {{$requisition->clinician_id}}, name - 
                {{$requisition->user->name}}.        
            </div>
            <div class="text-center">Requisition created on {{$requisition->created_at}}</div>
                <div class="container-fluid">
                        <form action="/requisitions/{{$requisition->id}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                              <div class="col">
                                <input type="text" class="form-control" name="procedure" placeholder="Procedure">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control"  name="description" placeholder="Description">
                              </div>
                            <button type="submit" class="btn btn-primary">Submit corrections</button>
                            </div>
                        </form> 
                </div>
              </div>
    @endsection