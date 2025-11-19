<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class lombaController extends Controller
{
    public function index($eventId)
    {
        // Opsional: Anda bisa memeriksa apakah event exist
        $event = events::findOrFail($eventId);

        // Kirim data ke blade
        return view('lomba', [
            'eventId' => $eventId,
            'event' => $event,
        ]);
    }
}
