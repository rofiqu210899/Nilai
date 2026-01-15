<?php

namespace App\Imports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KategoriImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kategori([
            'event_id' => $row[1],
            'lomba_id' => $row[2],
            'kategori' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
