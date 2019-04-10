{{-- this page is almost identical to create.blade.php, except list only macros, that are marked as completed --}}
@extends('layouts.app')
@section('body')
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">macro ID</th>
            <th scope="col">Macro created_at</th>
            <th scope="col">Requisition ID</th>
            <th scope="col">Macro description</th>
            <th scope="col">modify</th>
            {{-- <th scope="col">macro completed?</th> --}}
          </tr>
        </thead>
        <tbody>
{{-- only list macros that are not marked as completed --}}           
            @foreach ($macros as $macro) 
                @if ($macro->completed === 1)          
                <tr>
                    <td>{{$macro->id}}</td>
                    <td>{{$macro->created_at}}</td>
                    <td>{{$macro->requisition->id}}</td>
                    <td>{{$macro->macro}}</td>                    
                    <td>                      
                        <a href="/macros/{{$macro->id}}/edit">Modify</a>                   
                  {{--   <td> --}}
    {{-- mark here as completed macro --}}
                      {{--   <form action="/macros/{{$macro->id}}" method="POST">
                            @method('PATCH')
                            @csrf
<input type="checkbox" name="completed" {{$macro->completed ? 'checked' :''}} onClick="this.form.submit()">
                        </form> --}}
    {{-- end mark macro as completed --}}
                   {{--  </td> --}}
                </tr>
                @endif 
            @endforeach             
{{-- end only list macros that are not marked as completed --}}  
        </tbody>
</table>
@endsection