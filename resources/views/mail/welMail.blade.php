@extends('layout')

@section('title','welcomeMail')

@section('Main')

<h1> {{ $titleMail }}</h1>

<p>
    {{ $mailbody }}
   
    {{-- Hey, EstherHtoo21 -
    
    Per your request, here's a quick note to inform you that the "Eloquent Performance Patterns" series has been updated!
    
    Filtering and Sorting Anniversary Dates --}}
    </p>

<h4>{{ $by }}</h4>
    
@endsection