<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class juriController extends Controller
{
    public function index($eventId)
    {
        return view('juri', [
            'eventId' => $eventId,

        ]);
    }
}
