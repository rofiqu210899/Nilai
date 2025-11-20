<div class="container mt-4">
    {{-- Flash Message --}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- Form Pilih Lomba & Juri --}}
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
                    <label>Juri</label>
                    <select wire:model="juri_id" class="form-control">
                        <option value="">-- pilih juri --</option>
                        @foreach($juris as $juri)
                        <option value="{{ $juri->id }}">{{ $juri->nama_juri }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>&nbsp;</label>
                    <button wire:click="cari" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Nilai --}}
    @if(count($pesertaList))
    <form wire:submit.prevent="simpan">
        <div class="card">
            <div class="card-header fw-bold">
                Daftar Peserta & Nilai |
                Nama Lomba = {{ optional($lombas->firstWhere('id', $lomba_id))->nama_lomba ?? '-' }} |
                Juri = {{ optional($juris->firstWhere('id', $juri_id))->nama_juri ?? '-' }}
            </div>

            <div class="card-body p-0">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Peserta</th>
                            @foreach($kategoris as $kategori)
                            <th>{{ $kategori->kategori }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($pesertaList as $peserta)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peserta->nama_peserta }}</td>
                            @foreach($kategoris as $kategori)
                            <td>
                                <input type="number" min="0" max="100" class="form-control"
                                    wire:model.defer="inputs.{{ $peserta->id }}.{{ $kategori->id }}">
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Simpan Semua Nilai</button>
    </form>
    @endif

</div>