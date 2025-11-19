<div class="container mt-4">

    <div class="card mb-4">
        <div class="card-header fw-bold">Rekap Nilai Per Lomba</div>
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-4">
                    <label>Lomba</label>
                    <select wire:model="lomba_id" class="form-control">
                        <option value="">-- pilih lomba --</option>
                        @foreach ($lombas as $lomba)
                        <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Filter Juri</label>
                    <select wire:model="juri_id" class="form-control">
                        <option value="">Semua Juri</option>
                        @foreach ($juris as $juri)
                        <option value="{{ $juri->id }}">{{ $juri->nama_juri }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Cari Peserta</label>
                    <input type="text" wire:model="search" class="form-control" placeholder="Cari nama peserta...">
                </div>

            </div>
        </div>
    </div>

    @if($lomba_id)
    <div class="card">
        <div class="card-header fw-bold">Hasil Rekap</div>

        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th>#</th>

                    <th wire:click="sortBy('nama_peserta')" style="cursor:pointer">
                        Nama Peserta
                        @if($sortField == 'nama_peserta') ({{ $sortDirection }}) @endif
                    </th>

                    <th>Jumlah Penilai</th>

                    <th wire:click="sortBy('total_nilai')" style="cursor:pointer">
                        Total Nilai
                        @if($sortField == 'total_nilai') ({{ $sortDirection }}) @endif
                    </th>

                    <th wire:click="sortBy('rata_rata')" style="cursor:pointer">
                        Rata-rata
                        @if($sortField == 'rata_rata') ({{ $sortDirection }}) @endif
                    </th>

                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                @php $rank = 1; @endphp
                @foreach ($rekap as $item)
                <tr>
                    <td>{{ $rank++ }}</td>
                    <td>{{ $item->nama_peserta }}</td>
                    <td>{{ $item->jumlah_penilai }}</td>
                    <td>{{ $item->total_nilai }}</td>
                    <td>{{ number_format($item->rata_rata, 2) }}</td>
                    <td><span class="badge bg-success">{{ $rank-1 }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>