@extends('main.welcome')
@section('main')
<div class="content-area">
    <div class="row g-3 g-md-4">
        <!-- Stats Cards -->
        <div class="container py-4">

            {{-- Flash Message --}}
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Card Input --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Import Peserta</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p>Format file Excel (.xlsx) yang diimpor harus sesuai dengan kolom berikut:</p>
                        <button class="btn btn-success btn-sm">
                            <a href="{{ asset('TemplateImportExcel/Template_Peserta_Import_Excel.xlsx') }}"
                                style="color: white; text-decoration: none;" download>Download Template Excel</a>
                        </button>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('ProccessImportPeserta') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="file" class="form-label">Pilih file Excel (.xlsx)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                            @error('file') <small class="text-danger">{{ $message }}</small> @enderror
                            <button type="submit" class="btn btn-primary mt-3">Import</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5>Import Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p>Format file Excel (.xlsx) yang diimpor harus sesuai dengan kolom berikut:</p>
                        <button class="btn btn-success btn-sm">
                            <a href="{{ asset('TemplateImportExcel/Template_Kategori_Import_Excel.xlsx') }}"
                                style="color: white; text-decoration: none;" download>Download Template Excel</a>
                        </button>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('ProccessImportKategori') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label for="file" class="form-label">Pilih file Excel (.xlsx)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                            @error('file') <small class="text-danger">{{ $message }}</small> @enderror
                            <button type="submit" class="btn btn-primary mt-3">Import</button>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection