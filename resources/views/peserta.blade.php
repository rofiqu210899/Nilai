@extends('main.welcome')

@section('main')
<div class="content-area">
    @livewire('peserta-page', ['eventId' => $eventId])
</div>
@endsection