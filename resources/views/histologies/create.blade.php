@extends('layouts.app')
@section('body')
<div class="container-fluid bg-warning text-center"><a href="/histologies/show">List of YOUR completed histologies</a></div>
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">histology ID</th>
            <th scope="col">histology created_at</th>
            <th scope="col">Requisition ID</th>
            <th scope="col">Clinician</th>
            <th scope="col">Procedure</th>
            <th scope="col">Requisition description</th>
            <th scope="col">Macro description</th>
            <th scope="col">number of slides</th>
            <th scope="col">modify</th>
            <th scope="col">histology completed?</th>
          </tr>
        </thead>
        <tbody>
{{-- only list histologys that are not marked as completed --}}           
            @foreach ($histologies as $histology) 
                @if ($histology->completed === 0)          
                <tr>
                    <td>{{$histology->id}}</td>
                    <td>{{$histology->created_at}}</td>
                    <td>{{$histology->requisition->id}}</td>
                    <td>{{$histology->requisition->user->name}}</td>
                    <td>{{$histology->requisition->procedure}}</td>
                    <td>{{$histology->requisition->description}}</td>
                    <td>
                @if ($histology->requisition->macro != null)
                        {{$histology->requisition->macro->macro}}
                @else
                    not available
                @endif
                    </td>
                    <td>{{$histology->slides}}</td>                    
                    <td>                      
                        <a href="/histologies/{{$histology->id}}/edit">Modify</a>                   
                    <td>
    {{-- mark here as completed histology --}}
                        <form action="/histologies/{{$histology->id}}" method="POST">
                            @method('PATCH')
                            @csrf
<input type="checkbox" name="completed" {{$histology->completed ? 'checked' :''}} onChange="this.form.submit()">
                        </form>
    {{-- end mark histology as completed --}}
                    </td>
                </tr>
                @endif 
            @endforeach             
{{-- end only list histologys that are not marked as completed --}}  
        </tbody>
</table>
@endsection