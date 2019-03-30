@extends('layouts.app')

@if (auth()->check())
    <h2>your content appears here</h2>
@elseif
    <h2>Welcome to EVANTACORP </h2>
@endif