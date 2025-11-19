<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nilai;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Juri;

class NilaiPage extends Component
{
    public $eventId;

    public $lomba_id;
    public $peserta_id;
    public $juri_id;
    public $nilai;

    public $editingId = null;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }

    public function save()
    {
        $this->validate([
            'lomba_id' => 'required',
            'peserta_id' => 'required',
            'juri_id' => 'required',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        if ($this->editingId) {
            Nilai::where('id', $this->editingId)->update([
                'id_lomba' => $this->lomba_id,
                'id_peserta' => $this->peserta_id,
                'id_juri' => $this->juri_id,
                'nilai' => $this->nilai,
            ]);

            $this->resetForm();
            return;
        }

        // Cegah penilaian ganda oleh juri yang sama
        $exists = Nilai::where('id_lomba', $this->lomba_id)
            ->where('id_peserta', $this->peserta_id)
            ->where('id_juri', $this->juri_id)
            ->exists();

        if ($exists) {
            session()->flash('error', 'Juri ini sudah menilai peserta tersebut.');
            return;
        }

        Nilai::create([
            'id_event' => $this->eventId,
            'id_lomba' => $this->lomba_id,
            'id_peserta' => $this->peserta_id,
            'id_juri' => $this->juri_id,
            'nilai' => $this->nilai,
        ]);

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['lomba_id', 'peserta_id', 'juri_id', 'nilai', 'editingId']);
    }

    public function edit($id)
    {
        $n = Nilai::findOrFail($id);

        $this->editingId = $n->id;
        $this->lomba_id = $n->id_lomba;
        $this->peserta_id = $n->id_peserta;
        $this->juri_id = $n->id_juri;
        $this->nilai = $n->nilai;
    }

    public function delete($id)
    {
        Nilai::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.nilai-page', [
            'lombas' => Lomba::where('event_id', $this->eventId)->get(),
            'pesertas' => Peserta::where('event_id', $this->eventId)->get(),
            'juris' => Juri::where('event_id', $this->eventId)->get(),
            'nilais' => Nilai::where('id_event', $this->eventId)->get(),
        ]);
    }
}
