<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nilai;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Juri;
use App\Models\Kategori;

class NilaiPage extends Component
{
    public $eventId;
    public $lomba_id;
    public $juri_id;

    public $pesertaList = [];
    public $kategoris = [];
    public $nilais = [];
    public $inputs = []; // [peserta_id][kategori_id] => nilai

    public function mount($eventId)
    {
        $this->eventId = $eventId;
        $this->kategoris = Kategori::all();
    }

    public function render()
    {
        $lombas = Lomba::where('event_id', $this->eventId)->get();
        $juris = Juri::where('event_id', $this->eventId)->get();

        if ($this->lomba_id && $this->juri_id) {
            // Ambil seluruh peserta untuk lomba
            $this->pesertaList = Peserta::where('lomba_id', $this->lomba_id)
                ->orderBy('nama_peserta')->get();

            $this->kategoris = Kategori::where('lomba_id', $this->lomba_id)->get();

            // Ambil nilai yang sudah tersimpan untuk lomba + juri
            $nilaiDb = Nilai::where('id_event', $this->eventId)
                ->where('id_lomba', $this->lomba_id)
                ->where('id_juri', $this->juri_id)
                ->get()
                ->keyBy(function ($item) {
                    // key: peserta_id + kategori_id
                    return $item->id_peserta . '-' . $item->id_kategori;
                });

            // Mapping nilai ke inputs untuk form
            foreach ($this->pesertaList as $peserta) {
                foreach ($this->kategoris as $kategori) {
                    $key = $peserta->id . '-' . $kategori->id;
                    $this->inputs[$peserta->id][$kategori->id] = $nilaiDb[$key]->nilai ?? null;
                }
            }
        }

        return view('livewire.nilai-page', compact('lombas', 'juris'));
    }

    public function cari()
    {
        // trigger refresh Livewire
    }

    public function simpan()
    {
        foreach ($this->inputs as $peserta_id => $kategoriNilai) {
            foreach ($kategoriNilai as $kategori_id => $nilai) {
                if ($nilai !== null) {

                    // dd($kategori_id);
                    Nilai::updateOrCreate(
                        [
                            'id_event' => $this->eventId,
                            'id_lomba' => $this->lomba_id,
                            'id_juri' => $this->juri_id,
                            'id_peserta' => $peserta_id,
                            'id_kategori' => $kategori_id
                        ],
                        ['nilai' => $nilai]
                    );
                }
            }
        }

        session()->flash('success', 'Nilai berhasil disimpan.');
    }
}
