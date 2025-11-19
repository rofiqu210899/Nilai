<div class="container mt-4">

    {{-- Card Input Lomba --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">
            Tambah Lomba
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label class="form-label">Nama Lomba</label>
                    <input type="text" class="form-control" wire:model="nama_lomba" placeholder="Contoh: Lari 100m">
                    @error('nama_lomba')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{ $editingId ? 'Update Lomba' : 'Tambah Lomba' }}
                </button>
            </form>
        </div>
    </div>

    {{-- Card Tabel Lomba --}}
    <div class="card">
        <div class="card-header fw-bold">
            Daftar Lomba
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered m-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px">#</th>
                        <th>Nama Lomba</th>
                        <th style="width: 150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lombas as $index => $lomba)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lomba->nama_lomba }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" wire:click="edit({{ $lomba->id }})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $lomba->id }})"
                                onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada lomba</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>