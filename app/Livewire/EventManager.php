<?php

namespace App\Livewire;

use App\Models\events;
use Livewire\Component;

class EventManager extends Component
{

    public $name;
    public $event_date;

    public $eventId; // untuk update

    public function render()
    {
        return view('livewire.event-manager', [
            'events' => events::latest()->get()
        ]);
    }
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'event_date' => 'required|date',
        ]);

        events::create([
            'name' => $this->name,
            'event_date' => $this->event_date,
        ]);

        $this->reset(['name', 'event_date']);
        $this->dispatch('event-created');
        session()->flash('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = events::findOrFail($id);

        $this->eventId    = $id;
        $this->name       = $event->name;
        $this->event_date = $event->event_date;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'event_date' => 'required',
        ]);

        events::find($this->eventId)->update([
            'name' => $this->name,
            'event_date' => $this->event_date,
        ]);

        $this->reset(['name', 'event_date', 'eventId']);

        session()->flash('success', 'Event diperbarui.');
    }

    public function delete($id)
    {
        events::find($id)->delete();
        $this->dispatch('event-deleted');
        session()->flash('success', 'Event berhasil dihapus.');
    }
}
