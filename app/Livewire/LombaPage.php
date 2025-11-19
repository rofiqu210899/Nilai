<?php

namespace App\Livewire;

use App\Models\Lomba;
use App\Models\lombas;
use Livewire\Component;

class LombaPage extends Component
{
    public $eventId;
    public $nama_lomba;
    public $editingId = null;

    public function mount($eventId)
    {
        // dd($eventId);
        $this->eventId = $eventId;
    }

    public function save()
    {
        $this->validate([
            'nama_lomba' => 'required',
        ]);

        if ($this->editingId) {
            Lomba::where('id', $this->editingId)->update([
                'nama_lomba' => $this->nama_lomba,
            ]);
        } else {
            Lomba::create([
                'event_id' => $this->eventId,
                'nama_lomba' => $this->nama_lomba,
            ]);
        }

        $this->reset(['nama_lomba', 'editingId']);
    }

    public function edit($id)
    {
        $lomba = Lomba::findOrFail($id);
        $this->editingId = $id;
        $this->nama_lomba = $lomba->nama_lomba;
    }

    public function delete($id)
    {
        Lomba::destroy($id);
    }

    public function render()
    {
        return view('livewire.lomba-page', [
            'lombas' => Lomba::where('event_id', $this->eventId)->get(),
        ]);
    }
}
