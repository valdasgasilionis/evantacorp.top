<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
            color:black;
            font-size: 16px;
            background-color:cadetblue;
            border-radius: 3px;
            padding: 0 15px;
            margin: 0 5px;
        }
    </style>

</head>
<body>
{{-- bootstrap nav container --}}
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
{{-- link for logged clinicians --}}
@if (auth()->check())
     @if (auth()->user()->isClinician())
        <a class="nav-link" href="/requisitions">List of all Your REQUISITIONS</a>
    @endif 
@endif   
{{-- link for logged pathologists --}}  
@if (auth()->check())
     @if (auth()->user()->isPathologist())
        <a class="nav-link" href="/reports">List of all REQUISITIONS</a>
        <a class="nav-link" href="/reports/create">List of your iNCOMPLE Reports</a>
        <a class="nav-link" href="/reports/show">List of your COMPLETED Reports</a>
    @endif 
@endif  
{{-- link for logged technologists --}}  
@if (auth()->check())
    @if (auth()->user()->isTechnologist())
        <a class="nav-link" href="/macros">Macros</a>   

        <a class="nav-link" href="/histologies">Histology</a>
        
        <a class="nav-link" href="/immunos">Immuno</a>
        
    @endif 
@endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="float-right">  
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                      
                    @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                            @endif
                    @else
                <li class="nav-item">
                    <div class="container-fluid text-danger">
                                 <h5>   {{ Auth::user()->name }} </h5>
                    </div>
                </li>
                <li class="nav-item">                            
                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
    <div class="flex-center position-ref full-height">
       {{--  @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
        <main class="py-4">
                @yield('content')
        </main>
       
        <main class="py-4">
            @yield('body')
            @include('errors')
    </main>
        
    </div>
    
      
</body>
</html>
