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
                    0
                </div>
                <div class="stats-label">
                    Total Event
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"><i
                        class="bi bi-cart"></i>
                </div>
                <div class="stats-value">
                    0
                </div>
                <div class="stats-label">
                    Total Lomba
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"><i
                        class="bi bi-currency-dollar"></i>
                </div>
                <div class="stats-value">
                    0
                </div>
                <div class="stats-label">
                    Jumlah Juri
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);"><i
                        class="bi bi-star"></i>
                </div>
                <div class="stats-value">
                    0
                </div>
                <div class="stats-label">
                    Peserta
                </div>
            </div>
        </div>
    </div><!-- Chart Section -->
    <div class="row mt-3 mt-md-4">
        <div class="col-12">
            <div class="chart-card">
                <h5 class="mb-3 mb-md-4">Grafik</h5>
                <div class="chart-placeholder"><span>Area untuk Chart / Grafik</span>
                </div>
            </div>
        </div>
    </div><!-- Recent Activity -->

</div>
@endsection