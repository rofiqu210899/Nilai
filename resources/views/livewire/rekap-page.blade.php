<div class="container mt-4">

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
                    <th>Total Nilai</th>
                    <th>Rata-rata</th>
                </tr>
            </thead>
            <tbody>

                @foreach($rekap['pesertas'] as $i => $peserta)
                <tr>
                    <td>#{{ $i+1 }}</td>
                    <td>{{ $peserta->no_peserta ?? '-' }}</td>
                    <td>{{ $peserta->nama_peserta }}</td>
                    <td class="text-success fw-bold">{{ $peserta->total_nilai }}</td>
                    <td class="text-primary">{{ $peserta->rata_rata }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endforeach

</div>