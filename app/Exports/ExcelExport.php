<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function view(): View
    {
        return view('exportExcel', [
            'data' => Nilai::with('lomba', 'peserta', 'juri', 'kategori')
                ->where('id_event', $this->eventId)
                ->get(),
        ]);
    }
}
