<?php

namespace App\Livewire;

use App\Models\Lomba;
use App\Models\Nilai;
use App\Models\Peserta;
use Livewire\Component;

class RekapPage extends Component
{
    public $eventId;

    public function mount($eventId = null)
    {
        $this->eventId = $eventId ?? session('event_id');
    }

    public function render()
    {
        // Ambil semua lomba di event
        $lombas = Lomba::where('event_id', $this->eventId)->get();

        $rekapPerLomba = [];

        foreach ($lombas as $lomba) {

            // Ambil peserta sesuai lomba
            $pesertas = Peserta::where('lomba_id', $lomba->id)->get();

            // 🔹 Ambil semua kategori yang pernah dinilai pada lomba ini
            $kategoriList = Nilai::where('id_lomba', $lomba->id)
                ->with('kategori')
                ->get()
                ->pluck('kategori')
                ->unique('id')
                ->values();

            // Hitung nilai per peserta
            $data = $pesertas->map(function ($peserta) use ($lomba, $kategoriList) {

                // Query dasar nilai peserta
                $nilaiQuery = Nilai::where('id_lomba', $lomba->id)
                    ->where('id_peserta', $peserta->id);

                // 🔹 Hitungan total & rata-rata
                $peserta->total_nilai = $nilaiQuery->sum('nilai');
                $peserta->rata_rata   = round($nilaiQuery->avg('nilai'), 2);
                $peserta->jumlah_penilai = $nilaiQuery->count();

                // 🔹 Nilai per kategori
                $nilaiPerKategori = [];

                foreach ($kategoriList as $kat) {
                    $nilaiPerKategori[$kat->kategori] = Nilai::where('id_lomba', $lomba->id)
                        ->where('id_peserta', $peserta->id)
                        ->where('id_kategori', $kat->id)
                        ->sum('nilai') ?: 0;
                }

                $peserta->nilai_per_kategori = $nilaiPerKategori;

                return $peserta;
            })
                ->sortByDesc('total_nilai')
                ->values();

            // Simpan hasil rekap
            $rekapPerLomba[] = [
                'lomba'        => $lomba,
                'kategoriList' => $kategoriList,
                'pesertas'     => $data,
            ];
        }

        return view('livewire.rekap-page', [
            'rekapPerLomba' => $rekapPerLomba
        ]);
    }
}
