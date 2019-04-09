@extends('layouts.app')
    @section('body')
</div class="container"><a href="/requisitions" class="bg-warning">Back to Requisitions</a></div>
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
 {{-- EDIT requisition --}}                   
                        <form action="/requisitions/{{$requisition->id}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <input type="text" class="form-control" name="procedure" value="{{$requisition->procedure}}" placeholder="Procedure">
                            </div>
                            <div class="form-row">
                                <textarea class="container-fluid" class="form-control"  name="description" placeholder="Description">{{$requisition->description}}</textarea>
                            </div>
                            <div class="form-row">
                                
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Submit corrections</button>
                                </div>
                        </form> 
{{-- DELETE requisition if no pathology report available --}}
            @if ($requisition->report === null)                
            
                        <form action="/requisitions/{{$requisition->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                                <div class="col">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                        </form> 
            @endif            
                                
                            </div>
                </div>
            </div>
    @endsection