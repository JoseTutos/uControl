@extends('layouts.app')

@section('title', 'Panel Principal')

@section('content')
<div class="container-fluid px-0">
  <div class="row">
    <div class="col-md-12 px-3 py-4"> <!-- ajusta px según el espacio deseado -->
      <!-- Encabezado -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark fw-bold">Dashboard</h2>
      </div>
    </div>
  </div>
</div>

  <!-- Métricas principales -->
  <div class="row g-4">
<!-- Clientes con mercancía activa -->
<div class="col-xl-3 col-md-6">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow me-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('argon/assets/img/mercanciaa.png') }}" alt="Clientes con mercancía activa" style="width:24px; height:24px;">
                </div>
                <div>
                    <p class="text-xs text-uppercase text-muted mb-1 fw-bold">Clientes con mercancía activa</p>
                    <h4 class="fw-bolder mb-0">{{ $clientesActivos }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Top cliente por ocupación -->
<div class="col-xl-3 col-md-6">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow me-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('argon/assets/img/topclientes.png') }}" alt="Top Cliente" style="width:24px; height:24px;">
                </div>
                <div>
                    <p class="text-xs text-uppercase text-muted mb-1 fw-bold">Top cliente por ocupación</p>
                    <h6 class="fw-bolder mb-0">{{ $topClienteNombre ?? '-' }}</h6>
                    <small class="text-success fw-bold">
                        {{ number_format($topClienteOcupacion ?? 0, 2) }} m²
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total productos almacenados -->
<div class="col-xl-3 col-md-6">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow me-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('argon/assets/img/palmacenados.png') }}" alt="Productos almacenados" style="width:24px; height:24px;">
                </div>
                <div>
                    <p class="text-xs text-uppercase text-muted mb-1 fw-bold">Productos almacenados</p>
                    <h4 class="fw-bolder mb-0">{{ $totalProductos ?? 0 }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Movimientos este mes -->
<div class="col-xl-3 col-md-6">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow me-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('argon/assets/img/movimientos.png') }}" alt="Movimientos" style="width:24px; height:24px;">
                </div>
                <div>
                    <p class="text-xs text-uppercase text-muted mb-1 fw-bold">Movimientos este mes</p>
                    <h4 class="fw-bolder mb-0">{{ $movimientosMes ?? 0 }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Capacidad por bodega -->
<div class="row mt-4">
    @foreach($bodegasConCapacidad as $bodega)
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-xs text-uppercase text-muted mb-1 fw-bold">{{ $bodega['nombre'] }}</p>
                            <h6 class="fw-bolder">{{ number_format($bodega['capacidad_total'], 2) }} m²</h6>
                            <small class="d-block text-success fw-bold">
                                {{ number_format($bodega['capacidad_ocupada'], 2) }} m² ocupados
                            </small>
                            <small class="d-block text-primary fw-bold">
                                {{ number_format($bodega['capacidad_disponible'], 2) }} m² disponibles
                            </small>
                        </div>
                        <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow d-flex align-items-center justify-content-center">
                            <img src="{{ asset('argon/assets/img/bodega.png') }}" alt="Bodega" style="width:24px; height:24px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

  <!-- Últimos movimientos y gráfico -->
<div class="row mt-4">
  <!-- Últimos movimientos -->
  <div class="col-xl-8 col-md-12 mb-4">
    <div class="card shadow-sm border-0">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">Últimos movimientos</h6>
        <a href="{{ route('movimientos.export') }}" class="btn btn-sm btn-primary d-flex align-items-center gap-2">
          <i class="fas fa-file-export"></i>
          <span class="fw-bold text-uppercase" style="font-size: 0.75rem;">Exportar</span>
        </a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        @if ($ultimosMovimientos->isEmpty())
          <div class="text-center p-4">
            <p class="text-muted mb-0">No hay movimientos recientes.</p>
          </div>
        @else
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead class="bg-light">
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Fecha</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Tipo</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Producto</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cantidad</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Bodega</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ultimosMovimientos as $mov)
                  @php
                    $colorClase = match($mov->tipo) {
                        'ingreso' => 'badge bg-success text-white',
                        'entrada' => 'badge bg-info text-dark',
                        'salida'  => 'badge bg-danger text-white',
                        default   => 'badge bg-secondary text-white',
                    };
                  @endphp
                  <tr>
                    <td class="text-sm text-secondary px-3">{{ $mov->fecha }}</td>
                    <td><span class="{{ $colorClase }}">{{ ucfirst($mov->tipo) }}</span></td>
                    <td class="text-sm">{{ $mov->producto->nombre ?? '-' }}</td>
                    <td class="text-sm">{{ $mov->cantidad }}</td>
                    <td class="text-sm">{{ $mov->bodega->nombre ?? '-' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-12 mb-4">
  <div class="card shadow-lg border-0 rounded-3 h-100">
    <div class="card-body d-flex flex-column">
      <h6 class="fw-bold mb-4 text-dark">Ranking de clientes por ocupación (m²)</h6>
      <canvas id="ocupacionClientesChart" style="max-height: 280px;"></canvas>
      <small class="text-muted mt-3">Datos actualizados al último registro</small>
    </div>
  </div>
</div>
</div>

<!-- Gráfico o KPI -->


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('ocupacionClientesChart').getContext('2d');
  const ocupacionChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($labels ?? []),
      datasets: [{
        label: 'Ocupación (m²)',
        data: @json($data ?? []),
        backgroundColor: function(context) {
          const value = context.dataset.data[context.dataIndex];
          // Gradiente azul con variación según valor (más ocupado más oscuro)
          const alpha = 0.3 + (value / Math.max(...context.dataset.data)) * 0.7;
          return `rgba(33, 150, 243, ${alpha.toFixed(2)})`;
        },
        borderColor: 'rgba(33, 150, 243, 0.85)',
        borderWidth: 2,
        borderRadius: 6,
        maxBarThickness: 30,
        hoverBackgroundColor: 'rgba(30, 136, 229, 1)',
        hoverBorderColor: 'rgba(30, 136, 229, 1)'
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: { left: 10, right: 10, top: 5, bottom: 5 }
      },
      scales: {
        x: {
          beginAtZero: true,
          grid: {
            color: '#e9ecef',
            borderDash: [5, 5]
          },
          ticks: {
            color: '#495057',
            font: { size: 13, weight: '600' },
            callback: value => value + ' '
          },
          title: {
            display: true,
            text: ' ',
            color: '#6c757d',
            font: { size: 14, weight: '600' }
          }
        },
        y: {
          ticks: {
            color: '#343a40',
            font: { size: 14, weight: '700' },
            maxRotation: 0,
            autoSkip: false
          },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: 'rgba(33, 150, 243, 0.9)',
          titleFont: { size: 14, weight: 'bold' },
          bodyFont: { size: 13 },
          padding: 8,
          cornerRadius: 6,
          callbacks: {
            label: ctx => `${ctx.parsed.x.toFixed(2)} m²`
          }
        }
      },
      interaction: {
        intersect: false,
        mode: 'nearest'
      },
      animation: {
        duration: 1000,
        easing: 'easeOutQuart'
      }
    }
  });
</script>
@endpush

</div>
@endsection