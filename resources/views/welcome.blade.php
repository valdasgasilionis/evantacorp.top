@extends('layouts.app')
@section('body')
{{-- main container bootstrap --}}
    <main role="main" class="container">
        <div class="starter-template text-center">
            @if (auth()->check())    
{{-- login view for 4 types of users --}}
                @if (auth()->user()->isAdmin() | auth()->user()->isClinician())
                    <a href="/patients">List of Patients</a>
                @endif
                @if (auth()->user()->isAdmin() | auth()->user()->isPathologist())
                    <h1>Pathologist page</h1> 
                @endif
                @if (auth()->user()->isAdmin() | auth()->user()->isTechnologist())
                    <h1>Technologist page</h1>                   
                @endif
{{-- login for guest user --}}
            @else
                <h2>Welcome to EVANTACORP </h2>
            @endif
        </div>  
    </main>
@endsection