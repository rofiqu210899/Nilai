<div class="container mt-4" wire:poll.2s>

    @foreach($rekapPerLomba as $rekap)
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            🏁 {{ $rekap['lomba']->nama_lomba }}
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>No</th>
                    <th>Peserta</th>

                    @foreach ($rekap['kategoriList'] as $kat)
                    <th>{{ $kat->kategori }}</th>
                    @endforeach

                    <th>Total Nilai</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rekap['pesertas'] as $i => $peserta)
                <tr>
                    <td>#{{ $i+1 }}</td>
                    <td>{{ $peserta->no_peserta }}</td>
                    <td>{{ $peserta->nama_peserta }}</td>

                    @foreach ($rekap['kategoriList'] as $kat)
                    <td>{{ $peserta->nilai_per_kategori[$kat->kategori] }}</td>
                    @endforeach

                    <td class="fw-bold text-success">{{ $peserta->total_nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

</div>