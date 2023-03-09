@extends('layout')

@section('title','HomePage')

@section('css')
<link rel="stylesheet" href="style.css">
@endsection

@section('header')

<h2>
    HomePage
</h2>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem voluptatem earum velit quia laudantium excepturi id inventore magni sapiente similique nihil, aliquid cum eius omnis blanditiis, nemo accusantium ratione?</p>

@endsection

@section('Main')

@foreach ( $userdata as $eachUser )

<h1>Name: {{ $eachUser['name'] }}</h1>
<h2>Age: {{ $eachUser['age'] }}</h2>
<h2>Status: 
    {{ $eachUser["married"] ? "Married" : "Single"}}
</h2>
<hr>
    
@endforeach



@endsection

