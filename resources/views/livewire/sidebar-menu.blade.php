<div class="sidebar-menu">

    <a href="/" class="menu-item {{ request()->is('/') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> <span>Beranda</span>
    </a>

    <a href="{{ route('addEvent') }}" class="menu-item {{ request()->routeIs('addEvent') ? 'active' : '' }}">
        <i class="bi bi-graph-up"></i> <span>Event</span>
    </a>

    <a href="{{ route('ImportPeserta') }}" class="menu-item {{ request()->routeIs('ImportPeserta') ? 'active' : '' }}">
        <i class="bi bi-graph-up"></i> <span>Import Peserta</span>
    </a>

    <div class="nav-heading px-3 py-3 text-uppercase text-white-50 small">
        Event Aktif
    </div>

    @foreach ($events as $event)
    <div>

        {{-- ITEM UTAMA --}}
        <a href="#" wire:click.prevent="toggleEvent({{ $event->id }})"
            class="menu-item {{ $activeEventId === $event->id ? 'active' : '' }}"
            style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">

            <div style="display: flex; align-items: center; gap: 8px;">
                <i class="bi bi-calendar-event"></i>
                <span>{{ $event->name }}</span>
            </div>

            <i class="bi bi-chevron-down"></i>
        </a>


        {{-- SUBMENU --}}
        @if ($activeEventId === $event->id)
        <div class="submenu ms-4">

            <a href="/event/{{ $event->id }}/lomba"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/lomba') ? 'active' : '' }}">
                <span>• Lomba</span>
            </a>
            <a href="/event/{{ $event->id }}/Kategori-Penilaian"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/Kategori Penilaian') ? 'active' : '' }}">
                <span>• Kategori Penilaian</span>
            </a>

            <a href="/event/{{ $event->id }}/peserta"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/peserta') ? 'active' : '' }}">
                <span>• Peserta</span>
            </a>

            <a href="/event/{{ $event->id }}/juri"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/juri') ? 'active' : '' }}">
                <span>• Juri</span>
            </a>

            <a href="/event/{{ $event->id }}/nilai"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/nilai') ? 'active' : '' }}">
                <span>• Nilai</span>
            </a>
            <a href="/event/{{ $event->id }}/rekap"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/rekap') ? 'active' : '' }}">
                <span>• Rekap</span>
            </a>
            <a href="/event/{{ $event->id }}/excel"
                class="menu-item sub {{ request()->is('event/'.$event->id.'/excel') ? 'active' : '' }}">
                <span>• Export Excel</span>
            </a>

        </div>
        @endif

    </div>
    @endforeach

</div>