{{-- this page is almost identical to create.blade.php, except list only reports, that are marked as completed --}}
@extends('layouts.app')
    @section('body')
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Report ID</th>
                <th scope="col">Micro description</th>
                <th scope="col">Conclusion</th>
                <th scope="col">Note</th>
                <th scope="col">modify</th>
                <th scope="col">Report completed?</th>
              </tr>
            </thead>
            <tbody>
{{--  only list reports that are marked as completed --}}           
                @foreach ($reports as $report) 
                     @if ($report->completed === 1)          
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->micro}}</td>
                        <td>{{$report->conclusion}}</td>
                        <td>{{$report->note}}</td>
                        <td>
                            {{-- <button type="submit" class="btn btn-primary"> --}}
                                <a href="/reports/{{$report->id}}/edit">Modify</a>
                           {{--  </button> --}}
                        <td>
        {{-- mark here as completed report --}}
                            <form action="/reports/{{$report->id}}" method="POST">
                                @method('PATCH')
                                @csrf
<input type="checkbox" name="completed" {{$report->completed ? 'checked' :''}} onChange="this.form.submit()">
                            </form>
        {{-- end mark report as completed --}}
                        </td>
                    </tr>
                    @endif 
                @endforeach             
{{-- end only list reports that are marked as completed --}}  
            </tbody>
    </table>
    @endsection