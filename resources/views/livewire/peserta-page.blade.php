<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-header fw-bold">
            Tambah Peserta
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label>Lomba</label>
                    <select wire:model="lomba_id" class="form-control">
                        <option value="">-- pilih lomba --</option>
                        @foreach($lombas as $lomba)
                        <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Nama Peserta</label>
                    <input type="text" wire:model="nama_peserta" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>&nbsp;</label>
                    <button wire:click="save" class="btn btn-primary w-100">
                        {{ $editingId ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL PESERTA --}}
    <div class="card">
        <div class="card-header fw-bold">
            Daftar Lomba
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered m-0">
                <thead>
                    <tr>
                        <th style="width: 60px">#</th>
                        <th>Lomba</th>
                        <th>Nama Peserta</th>
                        <th style="width: 150px">Aksi</th>
                    </tr>
                </thead>
                @php
                $no = 1;
                @endphp
                <tbody>
                    @foreach ($pesertas as $peserta)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $peserta->lomba->nama_lomba }}</td>
                        <td>{{ $peserta->nama_peserta }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" wire:click="edit({{ $peserta->id }})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $peserta->id }})">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>