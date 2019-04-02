@extends('layouts.app')
    @section('body')
{{-- form to create a new patient --}}
<div class="container-fluid text-center text-uppercase text-danger bg-light">Create a new patient</div>
    <div class="container-fluid bg-secondary">
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
{{-- end form to create a new patient --}}

  {{-- <div class="container-fluid text-center text-uppercase"><a href="/patients/create">Create a new patient</a></div> --}}
{{-- bootstrap table template - patient list --}}
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Personal Number</th>
        <th scope="col">Register requisition</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)       
            <tr>
                <th scope="row">{{$patient->first_name}}</th>
                <td>{{$patient->last_name}}</td>
                <td>{{$patient->personal_number}}</td>
                <td><a href="/requisitions/create">create requisition</a></td>
            </tr> 
         @endforeach  
    </tbody>
  </table>

{{-- end of bootsrap table templase - patient list --}}              
@endsection