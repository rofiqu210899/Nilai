<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PesertaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Peserta([
            'event_id' => $row[1],
            'lomba_id' => $row[2],
            'nama_peserta' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
