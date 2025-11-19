@extends('main.welcome')

@section('main')

<div class="content-area">

    <h3>Input Nilai - Event: {{ $event->name }}</h3>
    <hr>

    @livewire('nilai-page', ['eventId' => $eventId])

</div>

@endsection