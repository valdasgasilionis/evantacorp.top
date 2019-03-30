@extends('layouts.app')
@section('body')
    
@endsection
    @if (auth()->check())
        <h2>your content appears here</h2>
    @else
        <h2>Welcome to EVANTACORP </h2>
    @endif
@endsection