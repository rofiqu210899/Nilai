<?php

namespace App\Livewire;

use App\Models\events;
use Livewire\Component;

class SidebarMenu extends Component
{
    public $events;
    public $activeEventId = null;

    public function toggleEvent($id)
    {
        $this->activeEventId = $this->activeEventId === $id ? null : $id;
    }

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = events::latest()->get();
    }

    protected $listeners = [
        'event-created' => 'loadEvents',
        'event-updated' => 'loadEvents',
        'event-deleted' => 'loadEvents',
    ];

    public function render()
    {
        return view('livewire.sidebar-menu');
    }
}
