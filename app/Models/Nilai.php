<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_event',
        'id_lomba',
        'id_peserta',
        'id_juri',
        'id_kategori',
        'nilai'
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }

    public function juri()
    {
        return $this->belongsTo(Juri::class, 'id_juri');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
