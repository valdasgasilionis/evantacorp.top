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
                   <td>Macro ID</td>
                   <td>{{$macro->id}}</td>
               </tr>
               <tr>
                    <td>Macro created on</td>
                    <td>{{$macro->created_at}}</td>
                </tr>
               <tr>
                    <td>Requisition ID</td>
                    <td>{{$macro->requisition->id}}</td>
                </tr>
        {{-- if report is available --}}
        @if ($macro->requisition->report != null)      
        
                <tr>
                    <td>Report ID</td>
                    <td>{{$macro->requisition->report->id}}</td>
                </tr>
        @endif        
        {{-- end if report is available --}}
                <tr>
                    <td>Technologist name</td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
{{-- fill in macro part of this report --}}
        <form action="/macros/{{$macro->id}}" method="POST">
            @method('PATCH')
            @csrf
             <tr>
                <td>
                    Macro description
                </td>
                <td>
                    <textarea class="container-fluid"  name="macro" placeholder="Macro description">{{$macro->macro}}</textarea>
                </td>
            </tr>            
            <tr>
                <td>Macro completed</td>
                <td>
                    {{$macro->completed ? "yes" : "no"}}
                </td>
            </tr>
            <tr>
                <td>Sumbit macro</td>
                <td>
                    <button type="submit" class="btn btn-primary">Update macro</button>
                </td>
            </tr>
        </form>
{{-- end fill in macro part of the report --}}
            </tbody>
    </table>
    @endsection