@extends('layouts.app')
@section('body')
<div class="container-fluid">
    @if (auth()->check())
    
        <h2>your content appears here</h2>
    @else
        <h2>Welcome to EVANTACORP </h2>
    @endif
</div>
@endsection