<?php

namespace App\Livewire;

use App\Models\Lomba;
use App\Models\Nilai;
use App\Models\Peserta;
use Livewire\Component;

class RekapPage extends Component
{
    public $eventId; // jika Anda pakai event aktif

    public function mount($eventId = null)
    {
        $this->eventId = $eventId ?? session('event_id');
    }

    public function render()
    {
        // Ambil semua lomba di event
        $lombas = Lomba::where('event_id', $this->eventId)->get();
        // dd($this->eventId, $lombas);

        // Array untuk menampung hasil rekap semua lomba
        $rekapPerLomba = [];

        foreach ($lombas as $lomba) {

            // Ambil peserta sesuai lomba
            $pesertas = Peserta::where('lomba_id', $lomba->id)->get();

            // Hitung nilai per peserta
            $data = $pesertas->map(function ($peserta) use ($lomba) {

                $nilaiQuery = Nilai::where('id_lomba', $lomba->id)
                    ->where('id_peserta', $peserta->id);

                $peserta->total_nilai = $nilaiQuery->sum('nilai');
                $peserta->rata_rata = round($nilaiQuery->avg('nilai'), 2);
                $peserta->jumlah_penilai = $nilaiQuery->count();

                return $peserta;
            })
                ->sortByDesc('total_nilai') // ranking otomatis
                ->values();

            // Simpan hasil rekap
            $rekapPerLomba[] = [
                'lomba' => $lomba,
                'pesertas' => $data,
            ];
        }

        return view('livewire.rekap-page', [
            'rekapPerLomba' => $rekapPerLomba
        ]);
    }
}
