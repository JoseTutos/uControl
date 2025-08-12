<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Cliente;
use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();  // Solo cargamos las bodegas simples

        $totalBodegas = $bodegas->count();
        $totalProductos = Producto::count();
        $totalClientes = Cliente::count();
        $ultimosMovimientos = Movimiento::latest()
            ->take(5)
            ->with(['producto', 'bodega', 'cliente'])
            ->get();

        // Calcular capacidad ocupada desde existencias usando espacio_ocupado
        $bodegas = Bodega::with('existencias')->get();

        $bodegasConCapacidad = $bodegas->map(function ($bodega) {
            $capacidadTotal = $bodega->capacidad ?? 0;
            $capacidadOcupada = optional($bodega->existencias)->sum('espacio_ocupado') ?? 0;

            return [
                'nombre' => $bodega->nombre,
                'capacidad_total' => $capacidadTotal,
                'capacidad_ocupada' => $capacidadOcupada,
                'capacidad_disponible' => max(0, $capacidadTotal - $capacidadOcupada),
            ];
        });

        return view('bodegas.index', compact(
            'bodegas',
            'totalBodegas',
            'totalProductos',
            'totalClientes',
            'ultimosMovimientos',
            'bodegasConCapacidad'
        ));
    }

    public function create()
    {
        return view('bodegas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'capacidad' => 'required|numeric',
            'estado' => 'required',
        ]);

        Bodega::create($request->all());

        return redirect()->route('bodegas.index')->with('success', 'Bodega creada exitosamente');
    }

    public function show(Bodega $bodega)
    {
        return view('bodegas.show', compact('bodega'));
    }
}
