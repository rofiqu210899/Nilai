@extends('main.welcome')
@section('main')
<div class="content-area">
    <div class="row g-3 g-md-4">
        <!-- Stats Cards -->
        @livewire('lomba-page', ['eventId' => $eventId]);
    </div>
</div>
@endsection