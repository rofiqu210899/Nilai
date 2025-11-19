<div class="container py-4">

    {{-- Flash Message --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Card Input --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5>{{ $eventId ? 'Edit Event' : 'Tambah Event' }}</h5>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <label>Nama Event</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Tanggal Event</label>
                <input type="date" class="form-control" wire:model="event_date">
                @error('event_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            @if($eventId)
            <button class="btn btn-warning" wire:click="update">Update</button>
            <button class="btn btn-secondary" wire:click="$set('eventId', null)">Batal</button>
            @else
            <button class="btn btn-primary" wire:click="save">Simpan</button>
            @endif

        </div>
    </div>

    {{-- Card Table --}}
    <div class="card">
        <div class="card-header">
            <h5>Daftar Event</h5>
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Event</th>
                        <th>Tanggal Event</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" wire:click="edit({{ $event->id }})">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $event->id }})"
                                onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>