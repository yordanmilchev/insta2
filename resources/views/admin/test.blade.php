@extends('admin.layout')
@section('title','Lightbox')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles_test.css') }}">
    <script defer src="{{ asset('js/script_test.js') }}"></script>
@endsection
@section('content')
    <div class="grid">
        <img src="https://source.unsplash.com/1000x800?beach" alt="beach">

        <img src="https://source.unsplash.com/1000x800?nature" alt="nature">

        <img src="https://source.unsplash.com/1000x800?mountain" alt="mountain">

        <img src="https://source.unsplash.com/1000x800?valley" alt="valley">

        <img src="https://source.unsplash.com/1000x800?water" alt="water">

        <img src="https://source.unsplash.com/1000x800?lake" alt="lake">

        <img src="https://source.unsplash.com/1000x800?trees" alt="trees">

        <img src="https://source.unsplash.com/1000x800?food" alt="food">

        <img src="https://source.unsplash.com/1000x800?animal" alt="animal">

    </div>
<br>
@endsection
