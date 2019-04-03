@extends('layouts.app')
    @section('body')
{{-- form to create a new patient --}}
<div class="jumbotron text-center text-uppercase text-danger bg-success">
  <div><a href="/requisitions">List of all Your REQUISITIONS</a></div>
  <div>Create a new patient</div>
    <div class="container-fluid">
            <form action="/patients" method="POST">
                @csrf
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" name="first_name" placeholder="First name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control"  name="last_name" placeholder="Last name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" name="personal_number" placeholder="Personal number">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form> 
    </div>
  </div>
{{-- end form to create a new patient --}}

  {{-- <div class="container-fluid text-center text-uppercase"><a href="/patients/create">Create a new patient</a></div> --}}
{{-- bootstrap table template - patient list --}}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Created on</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Personal Number</th>
        <th scope="col">Number of Requisitions</th>
        <th scope="col">Register requisition</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)       
            <tr>
                <th scope="row">{{$patient->created_at}}</th>
                <td>{{$patient->first_name}}</td>
                <td>{{$patient->last_name}}</td>
                <td>{{$patient->personal_number}}</td>
                <td>{{count($patient->requisition)}}</td>
                <td>
{{-- create new Requisition for this patient --}}
    <form action="/requisitions" method="POST">
      @csrf
      <input type="hidden" name="patient_id" value="{{$patient->id}}">
      <input type="hidden" name="clinician_id" value="{{auth()->id()}}">
      <button type="submit" class="btn btn-primary">Create new Requisition</button>
    </form>
{{-- end create new Requisition for this patient --}}

                </td>
            </tr> 
         @endforeach  
    </tbody>
  </table>

{{-- end of bootsrap table templase - patient list --}}              
@endsection