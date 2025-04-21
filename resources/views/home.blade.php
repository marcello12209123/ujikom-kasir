@extends('layouts.app')

@section('title', 'Dashboard Pembelian')

@section('content')
<div class="main-content-table">
    <section class="section py-5">
        <div class="container-sm">
            <h2 class="mb-5 text-center">📊 Dashboard Pembelian Produk per Bulan</h2>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0 rounded-4 p-4">
                        <h5 class="mb-3 text-center">Pembelian per Bulan (Bar Chart)</h5>
                        <canvas id="barChart" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const barChart = new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Jumlah Pembelian',
                backgroundColor: '#3b82f6',
                borderRadius: 8,
                data: {!! json_encode($totals) !!}
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat().format(value);
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
