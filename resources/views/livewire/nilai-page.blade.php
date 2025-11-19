<div class="container mt-4">

    {{-- FORM INPUT --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">Input Nilai</div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-3">
                    <label>Lomba</label>
                    <select wire:model="lomba_id" class="form-control">
                        <option value="">-- pilih lomba --</option>
                        @foreach($lombas as $lomba)
                        <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Peserta</label>
                    <select wire:model="peserta_id" class="form-control">
                        <option value="">-- pilih peserta --</option>
                        @foreach($pesertas as $peserta)
                        <option value="{{ $peserta->id }}">{{ $peserta->nama_peserta }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Juri</label>
                    <select wire:model="juri_id" class="form-control">
                        <option value="">-- pilih juri --</option>
                        @foreach($juris as $juri)
                        <option value="{{ $juri->id }}">{{ $juri->nama_juri }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label>Nilai</label>
                    <input type="number" wire:model="nilai" class="form-control" min="0" max="100">
                </div>

                <div class="col-md-1">
                    <label>&nbsp;</label>
                    <button wire:click="save" class="btn btn-primary w-100">
                        {{ $editingId ? 'Update' : 'Simpan' }}
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-header fw-bold">Daftar Nilai</div>
        <div class="card-body p-0">
            <table class="table table-bordered m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lomba</th>
                        <th>Peserta</th>
                        <th>Juri</th>
                        <th>Nilai</th>
                        <th style="width:150px">Aksi</th>
                    </tr>
                </thead>

                @php $no = 1; @endphp

                <tbody>
                    @foreach($nilais as $n)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $n->lomba->nama_lomba }}</td>
                        <td>{{ $n->peserta->nama_peserta }}</td>
                        <td>{{ $n->juri->nama_juri }}</td>
                        <td>{{ $n->nilai }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" wire:click="edit({{ $n->id }})">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $n->id }})">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>