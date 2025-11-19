<?php

namespace App\Livewire;

use App\Models\Lomba;
use App\Models\Peserta;
use Livewire\Component;

class PesertaPage extends Component
{
    public $eventId;
    public $lomba_id;
    public $nama_peserta;

    public $editingId = null;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }

    public function save()
    {
        $this->validate([
            'lomba_id' => 'required',
            'nama_peserta' => 'required',
        ]);

        if ($this->editingId) {
            Peserta::where('id', $this->editingId)->update([
                'lomba_id' => $this->lomba_id,
                'nama_peserta' => $this->nama_peserta,
            ]);
        } else {
            Peserta::create([
                'event_id' => $this->eventId,
                'lomba_id' => $this->lomba_id,
                'nama_peserta' => $this->nama_peserta,
            ]);
        }

        $this->reset(['nama_peserta', 'lomba_id', 'editingId']);
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);

        $this->editingId = $id;
        $this->lomba_id = $peserta->lomba_id;
        $this->nama_peserta = $peserta->nama_peserta;
    }

    public function delete($id)
    {
        Peserta::destroy($id);
    }

    public function render()
    {
        return view('livewire.peserta-page', [
            'lombas' => Lomba::where('event_id', $this->eventId)->get(),
            'pesertas' => Peserta::where('event_id', $this->eventId)->get(),
        ]);
    }
}
