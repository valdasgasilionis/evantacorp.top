@extends('layouts.app')
@section('body')
<div class="container-fluid bg-warning text-center"><a href="/macros/show">List of YOUR completed macros</a></div>
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">macro ID</th>
            <th scope="col">Macro created_at</th>
            <th scope="col">Requisition ID</th>
            <th scope="col">Clinician</th>
            <th scope="col">Procedure</th>
            <th scope="col">Requisition description</th>
            <th scope="col">Macro description</th>
            <th scope="col">modify</th>
            <th scope="col">macro completed?</th>
          </tr>
        </thead>
        <tbody>
{{-- only list macros that are not marked as completed --}}           
            @foreach ($macros as $macro) 
                @if ($macro->completed === 0)          
                <tr>
                    <td>{{$macro->id}}</td>
                    <td>{{$macro->created_at}}</td>
                    <td>{{$macro->requisition->id}}</td>
                    <td>{{$macro->requisition->user->name}}</td>
                    <td>{{$macro->requisition->procedure}}</td>
                    <td>{{$macro->requisition->description}}</td>
                    <td>{{$macro->macro}}</td>                    
                    <td>                      
                        <a href="/macros/{{$macro->id}}/edit">Modify</a>                   
                    <td>
    {{-- mark here as completed macro --}}
                        <form action="/macros/{{$macro->id}}" method="POST">
                            @method('PATCH')
                            @csrf
<input type="checkbox" name="completed" {{$macro->completed ? 'checked' :''}} onChange="this.form.submit()">
                        </form>
    {{-- end mark macro as completed --}}
                    </td>
                </tr>
                @endif 
            @endforeach             
{{-- end only list macros that are not marked as completed --}}  
        </tbody>
</table>
@endsection