@extends('layouts.app')
@section('body')
{{-- main container bootstrap --}}
    <main role="main" class="container">
        <div class="starter-template text-center">
            @if (auth()->check())    
{{-- login view for 4 types of users --}}
                @if (auth()->user()->isClinician())
                    <script>window.location ="/patients";</script>
                @endif
                @if (auth()->user()->isPathologist())
                    <script>window.location ="/reports";</script>
                @endif
                @if (auth()->user()->isTechnologist())
                    <script>window.location ="/macros";</script>                  
                @endif
                @if (auth()->user()->isAdmin())
                <script>window.location ="/admin";</script>                  
            @endif
{{-- login for guest user --}}
            @else
                <h2>Welcome to EVANTACORP </h2>
            @endif
        </div>  
    </main>
@endsection