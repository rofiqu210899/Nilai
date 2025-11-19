@extends('main.welcome')
@section('main')
<div class="content-area">
    <div class="row g-3 g-md-4">
        <!-- Stats Cards -->
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"><i
                        class="bi bi-people"></i>
                </div>
                <div class="stats-value">
                    1,234
                </div>
                <div class="stats-label">
                    Total Pengguna
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"><i
                        class="bi bi-cart"></i>
                </div>
                <div class="stats-value">
                    567
                </div>
                <div class="stats-label">
                    Penjualan
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"><i
                        class="bi bi-currency-dollar"></i>
                </div>
                <div class="stats-value">
                    45M
                </div>
                <div class="stats-label">
                    Pendapatan
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);"><i
                        class="bi bi-star"></i>
                </div>
                <div class="stats-value">
                    98%
                </div>
                <div class="stats-label">
                    Kepuasan
                </div>
            </div>
        </div>
    </div><!-- Chart Section -->
    <div class="row mt-3 mt-md-4">
        <div class="col-12">
            <div class="chart-card">
                <h5 class="mb-3 mb-md-4">Grafik Penjualan Bulanan</h5>
                <div class="chart-placeholder"><span>Area untuk Chart / Grafik</span>
                </div>
            </div>
        </div>
    </div><!-- Recent Activity -->
    <div class="row mt-3 mt-md-4">
        <div class="col-12 col-lg-6 mb-3 mb-lg-0">
            <div class="chart-card">
                <h5 class="mb-3">Aktivitas Terbaru</h5>
                <div class="list-group list-group-flush">
                    <div
                        class="list-group-item d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row">
                        <span><i class="bi bi-circle-fill text-success me-2" style="font-size: 0.5rem;"></i>Pengguna
                            baru terdaftar</span> <small class="text-muted mt-1 mt-sm-0">5 menit lalu</small>
                    </div>
                    <div
                        class="list-group-item d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row">
                        <span><i class="bi bi-circle-fill text-primary me-2" style="font-size: 0.5rem;"></i>Pesanan baru
                            diterima</span> <small class="text-muted mt-1 mt-sm-0">12 menit lalu</small>
                    </div>
                    <div
                        class="list-group-item d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row">
                        <span><i class="bi bi-circle-fill text-warning me-2" style="font-size: 0.5rem;"></i>Pembayaran
                            diproses</span> <small class="text-muted mt-1 mt-sm-0">1 jam lalu</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="chart-card">
                <h5 class="mb-3">Tugas Hari Ini</h5>
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="task1">
                            <label class="form-check-label" for="task1">Review laporan penjualan</label>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="task2">
                            <label class="form-check-label" for="task2">Update data produk</label>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="task3">
                            <label class="form-check-label" for="task3">Meeting dengan tim marketing</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection