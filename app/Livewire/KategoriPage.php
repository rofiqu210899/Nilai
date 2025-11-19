<?php

namespace App\Livewire;

use App\Models\Kategori;
use App\Models\Lomba;
use Livewire\Component;

class KategoriPage extends Component
{
    public $eventId;

    public $lomba_id;
    public $kategori;

    public $editingId = null;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }

    public function save()
    {
        $this->validate([
            'lomba_id' => 'required',
            'kategori' => 'required',
        ]);

        if ($this->editingId) {
            Kategori::where('id', $this->editingId)->update([
                'lomba_id' => $this->lomba_id,
                'kategori' => $this->kategori,
            ]);
        } else {
            Kategori::create([
                'event_id' => $this->eventId,
                'lomba_id' => $this->lomba_id,
                'kategori' => $this->kategori,
            ]);
        }

        $this->reset(['lomba_id', 'kategori', 'editingId']);
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        $this->editingId = $id;
        $this->lomba_id = $kategori->lomba_id;
        $this->kategori = $kategori->kategori;
    }

    public function delete($id)
    {
        Kategori::find($id)?->delete();
    }

    public function render()
    {
        // $lombas = Lomba::where('event_id', $this->eventId)->get();
        // dd($lombas);
        return view('livewire.kategori-page', [
            'lombas' => Lomba::where('event_id', $this->eventId)->get(),
            'kategoris' => Kategori::where('event_id', $this->eventId)->get(),
        ]);
    }
}
