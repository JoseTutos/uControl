<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
use App\Models\Movimiento;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    // Mostrar las últimas 20 salidas
    public function index()
    {
        $salidas = Salida::with([
            'existencia.producto',
            'existencia.cliente',
            'existencia.bodega',
            'usuario',
        ])
            ->latest()
            ->take(20)
            ->get();

        return view('salidas.index', compact('salidas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $existencias = Existencia::with(['producto', 'cliente', 'bodega'])->get();

        return view('salidas.create', compact('existencias'));
    }

    // Almacenar una nueva salida
    public function store(Request $request)
    {
        $request->validate([
            'existencia_id' => 'required|exists:existencias,id',
            'cantidad' => 'required|numeric|min:1',
            'fecha_salida' => 'required|date',
        ]);

        $existencia = Existencia::findOrFail($request->existencia_id);

        // Validar stock suficiente
        if ($request->cantidad > $existencia->cantidad_actual) {
            return back()
                ->withErrors(['cantidad' => 'La cantidad excede el stock disponible.'])
                ->withInput();
        }

        // Crear la salida
        // Crear la salida
        Salida::create([
            'existencia_id' => $existencia->id,
            'cantidad' => $request->cantidad,
            'usuario_id' => auth()->id(),
            'fecha_salida' => $request->fecha_salida,
            'observaciones' => $request->observaciones,
        ]);

        // Actualizar stock
        $existencia->decrement('cantidad_actual', $request->cantidad);

        // Registrar movimiento tipo "salida"
        Movimiento::create([
            'producto_id' => $existencia->producto_id, // ✅ campos reales de movimientos
            'cliente_id' => $existencia->cliente_id,
            'bodega_id' => $existencia->bodega_id,
            'tipo' => 'salida',
            'cantidad' => $request->cantidad,
            'usuario_id' => auth()->id(),
            'fecha' => $request->fecha_salida,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('salidas.index')->with('success', 'Salida registrada correctamente.');
    }

    // Mostrar detalle de una salida
    public function show(Salida $salida)
    {
        $salida->load([
            'existencia.producto',
            'existencia.cliente',
            'existencia.bodega',
            'usuario',
        ]);

        return view('salidas.show', compact('salida'));
    }
}
