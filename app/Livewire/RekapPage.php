<?php

namespace App\Livewire;

use App\Models\Juri;
use App\Models\Lomba;
use App\Models\Nilai;
use App\Models\Peserta;
use Livewire\Component;

class RekapPage extends Component
{
    public $lomba_id;
    public $juri_id;
    public $search = '';
    public $sortField = 'total_nilai';
    public $sortDirection = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $lombas = Lomba::all();
        $juris = Juri::all();

        // REKAP NILAI
        $rekap = Peserta::with(['lomba'])
            ->where('lomba_id', $this->lomba_id)
            ->when($this->search, function ($q) {
                $q->where('nama_peserta', 'like', "%$this->search%");
            })
            ->get()
            ->map(function ($peserta) {

                $query = Nilai::where('peserta_id', $peserta->id);

                if ($this->juri_id) {
                    $query->where('juri_id', $this->juri_id);
                }

                $peserta->total_nilai = $query->sum('nilai');
                $peserta->rata_rata = $query->avg('nilai');
                $peserta->jumlah_penilai = $query->count();

                return $peserta;
            })
            ->sortBy([
                [$this->sortField, $this->sortDirection]
            ]);

        return view('livewire.rekap-page', compact('rekap', 'lombas', 'juris'));
    }
}
