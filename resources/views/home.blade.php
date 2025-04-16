@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content-table">
    <section class="section">
        <div class="margin-content">
            <div class="container-sm">
                <div class="section-header">
                    <h1>User</h1>
                </div>
                <div class="section-body">

                    <!-- Wrapper untuk Chart yang sejajar -->
                    <div class="row">
                        <!-- Chart pertama -->
                        <div class="col-md-6">
                            <div class="chart-wrapper">
                                <h1>Votes Bar Chart</h1>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                        <!-- Chart kedua -->
                        <div class="col-md-6">
                            <div class="chart-wrapper">
                                <h1>Votes Pie Chart</h1>
                                <canvas id="2Chart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green'],
      datasets: [{
        label: '# of Votes',
        data: [, 19, 3, 5],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const cty = document.getElementById('2Chart');
  
  new Chart(cty, {
    type: 'pie',
    data: {
      labels: ['Jumlah', 'memberKondisi', ''],
      datasets: [{
        label: '# of Votes',
        data: [ '89', '9'],
        borderWidth: 1
      }]
    }
  });
</script>

@endsection
