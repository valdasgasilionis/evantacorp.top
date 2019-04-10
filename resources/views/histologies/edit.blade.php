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
                   <td>histology ID</td>
                   <td>{{$histology->id}}</td>
               </tr>
               <tr>
                    <td>histology created on</td>
                    <td>{{$histology->created_at}}</td>
                </tr>
               <tr>
                    <td>Requisition ID</td>
                    <td>{{$histology->requisition->id}}</td>
                </tr>
        {{-- if report is available --}}
        @if ($histology->requisition->report != null)      
        
                <tr>
                    <td>Report ID</td>
                    <td>{{$histology->requisition->report->id}}</td>
                </tr>
        @endif        
        {{-- end if report is available --}}
                <tr>
                    <td>Technologist name</td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
{{-- fill in histology part of this report --}}
        <form action="/histologies/{{$histology->id}}" method="POST">
            @method('PATCH')
            @csrf
             <tr>
                <td>
                    number of slides created
                </td>
                <td>
                    <input type="number" name="slides" value="{{$histology->slides}}">                    
                </td>
            </tr>            
            <tr>
                <td>histology completed</td>
                <td>
                    {{$histology->completed ? "yes" : "no"}}
                </td>
            </tr>
            <tr>
                <td>Sumbit histology</td>
                <td>
                    <button type="submit" class="btn btn-primary">Update histology</button>
                </td>
            </tr>
        </form>
{{-- end fill in histology part of the report --}}
            </tbody>
    </table>
    @endsection