<div class="container mt-4" wire:poll.2s>

    @foreach($rekapPerLomba as $rekap)
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            🏁 {{ $rekap['lomba']->nama_lomba }}
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">Rank</th>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Peserta</th>

                    {{-- Header kategori --}}
                    @foreach ($rekap['kategoriList'] as $kat)
                    <th colspan="{{ count($rekap['juriList']) }}" class="text-center">
                        {{ $kat->kategori }}
                    </th>
                    @endforeach

                    <th rowspan="2">Total</th>
                </tr>

                {{-- Header juri --}}
                <tr>
                    @foreach ($rekap['kategoriList'] as $kat)
                    @foreach ($rekap['juriList'] as $juri)
                    <th>{{ $juri->nama_juri }}</th>
                    @endforeach
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach ($rekap['pesertas'] as $i => $peserta)
                <tr>
                    <td>#{{ $i+1 }}</td>
                    <td>{{ $peserta->no_peserta }}</td>
                    <td>{{ $peserta->nama_peserta }}</td>

                    @foreach ($rekap['kategoriList'] as $kat)
                    @foreach ($rekap['juriList'] as $juri)
                    <td>
                        {{ $peserta->nilai_per_kategori_juri[$kat->kategori][$juri->nama_juri] }}
                    </td>
                    @endforeach
                    @endforeach

                    <td class="fw-bold text-success">{{ $peserta->total_nilai }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    @endforeach

</div>