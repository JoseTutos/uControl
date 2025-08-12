<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Cliente;
use App\Models\Existencia;
use App\Models\Movimiento;

class DashboardController extends Controller
{
    public function index()
    {
        $clientesActivos = Existencia::where('cantidad_actual', '>', 0)
            ->distinct('cliente_id')
            ->count('cliente_id');

        $totalClientes = Cliente::count();

        $bodegas = Bodega::all();

        $bodegasConCapacidad = $bodegas->map(function ($bodega) {
            $capacidadTotal = $bodega->capacidad ?? 0;
            $capacidadOcupada = Existencia::where('bodega_id', $bodega->id)->sum('espacio_ocupado') ?? 0;
            $capacidadDisponible = $capacidadTotal - $capacidadOcupada;

            return [
                'nombre' => $bodega->nombre,
                'capacidad_total' => $capacidadTotal,
                'capacidad_ocupada' => $capacidadOcupada,
                'capacidad_disponible' => max($capacidadDisponible, 0),
            ];
        });

        $ultimosMovimientos = Movimiento::with(['producto', 'cliente', 'bodega', 'usuario'])
            ->latest()
            ->take(5)
            ->get();

        $ocupacionClientes = Existencia::selectRaw('cliente_id, SUM(espacio_ocupado) as ocupacion_total')
            ->groupBy('cliente_id')
            ->orderByDesc('ocupacion_total')
            ->with('cliente')
            ->get();

        $topClientes = $ocupacionClientes->take(5);

        $labels = $topClientes->map(fn ($e) => $e->cliente->nombre ?? 'Cliente desconocido')->toArray();
        $data = $topClientes->pluck('ocupacion_total')->map(fn ($val) => round($val, 2))->toArray();

        return view('dashboard', compact(
            'clientesActivos',
            'totalClientes',
            'bodegasConCapacidad',
            'ultimosMovimientos',
            'labels',
            'data'
        ));
    }
}
