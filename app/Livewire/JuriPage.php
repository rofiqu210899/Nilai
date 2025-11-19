<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Juri;
use App\Models\Lomba;

class JuriPage extends Component
{
    public $eventId;

    public $lomba_id;
    public $nama_juri;

    public $editingId = null;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }

    public function save()
    {
        $this->validate([
            'lomba_id' => 'required',
            'nama_juri' => 'required',
        ]);

        if ($this->editingId) {
            Juri::where('id', $this->editingId)->update([
                'lomba_id' => $this->lomba_id,
                'nama_juri' => $this->nama_juri,
            ]);
        } else {
            Juri::create([
                'event_id' => $this->eventId,
                'lomba_id' => $this->lomba_id,
                'nama_juri' => $this->nama_juri,
            ]);
        }

        $this->reset(['lomba_id', 'nama_juri', 'editingId']);
    }

    public function edit($id)
    {
        $juri = Juri::findOrFail($id);

        $this->editingId = $id;
        $this->lomba_id = $juri->lomba_id;
        $this->nama_juri = $juri->nama_juri;
    }

    public function delete($id)
    {
        Juri::find($id)?->delete();
    }

    public function render()
    {
        return view('livewire.juri-page', [
            'lombas' => Lomba::where('event_id', $this->eventId)->get(),
            'juris' => Juri::where('event_id', $this->eventId)->get(),
        ]);
    }
}
