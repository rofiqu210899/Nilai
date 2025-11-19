<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pesertaController extends Controller
{
    public function index($eventId)
    {
        // Opsional: Anda bisa memeriksa apakah event exist


        // Kirim data ke blade
        return view('peserta', [
            'eventId' => $eventId,

        ]);
    }
}
