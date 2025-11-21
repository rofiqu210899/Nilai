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
        $lombas = Lomba::where('event_id', $this->eventId)->get();

        $rekapPerLomba = [];

        foreach ($lombas as $lomba) {

            $pesertas = Peserta::where('lomba_id', $lomba->id)->get();

            // 🔹 Ambil semua kategori
            $kategoriList = Nilai::where('id_lomba', $lomba->id)
                ->with('kategori')
                ->get()
                ->pluck('kategori')
                ->unique('id')
                ->values();

            // 🔹 Ambil semua juri yang menilai lomba tersebut
            $juriList = Nilai::where('id_lomba', $lomba->id)
                ->with('juri')
                ->get()
                ->pluck('juri')
                ->unique('id')
                ->values();

            $data = $pesertas->map(function ($peserta) use ($lomba, $kategoriList, $juriList) {

                $nilaiQuery = Nilai::where('id_lomba', $lomba->id)
                    ->where('id_peserta', $peserta->id);

                // Total & rata-rata
                $peserta->total_nilai = $nilaiQuery->sum('nilai');
                $peserta->rata_rata   = round($nilaiQuery->avg('nilai'), 2);

                // ================================
                // 🔥 NILAI PER KATEGORI PER JURI
                // ================================
                $nilaiPerKategoriJuri = [];

                foreach ($kategoriList as $kat) {
                    foreach ($juriList as $juri) {
                        $nilai = Nilai::where('id_lomba', $lomba->id)
                            ->where('id_peserta', $peserta->id)
                            ->where('id_kategori', $kat->id)
                            ->where('id_juri', $juri->id)
                            ->value('nilai') ?? 0;

                        $nilaiPerKategoriJuri[$kat->kategori][$juri->nama_juri] = $nilai;
                    }
                }

                $peserta->nilai_per_kategori_juri = $nilaiPerKategoriJuri;

                return $peserta;
            })
                ->sortByDesc('total_nilai')
                ->values();

            // Simpan rekap
            $rekapPerLomba[] = [
                'lomba'        => $lomba,
                'kategoriList' => $kategoriList,
                'juriList'     => $juriList,
                'pesertas'     => $data,
            ];
        }

        return view('livewire.rekap-page', [
            'rekapPerLomba' => $rekapPerLomba
        ]);
    }
}
