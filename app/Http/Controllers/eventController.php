<?php

namespace App\Http\Controllers;

use App\Imports\PesertaImport;
use App\Models\events;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class eventController extends Controller
{
    public function index()
    {
        $data = events::get();

        // dd($data);
        return view('dashboard', compact('data'));
    }
    public function addEvent()
    {
        $data = events::get();
        return view('addEvent', compact('data'));
    }
    public function lombaPage()
    {
        $data = events::get();
        return view('addEvent', compact('data'));
    }

    public function ImportPeserta()
    {
        return view('ImportPeserta');
    }


    public function ProccessImportPeserta(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv|max:2048', // Max size 2MB, sesuaikan dengan kebutuhan
        ]);

        // Ambil data file
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();

        // Pindahkan file ke direktori yang diinginkan
        $data->move(public_path('PesertaLomba'), $namafile);

        // Import data dari file yang diunggah
        Excel::import(new PesertaImport, public_path('Pesertalomba/' . $namafile));

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'File berhasil diunggah dan data berhasil diimport.');
    }
}
