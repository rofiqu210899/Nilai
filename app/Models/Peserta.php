<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'lomba_id',
        'nama_peserta',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }

    public function event()
    {
        return $this->belongsTo(events::class);
    }
}
