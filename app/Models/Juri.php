<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'lomba_id',
        'nama_juri',
    ];

    public function event()
    {
        return $this->belongsTo(events::class);
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }
}
