<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Existencia;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    // Mostrar las últimas 20 entradas con relaciones necesarias
    public function index()
    {
        $entradas = Entrada::with(['producto', 'usuario'])->latest()->take(20)->get();

        return view('entradas.index', compact('entradas'));
    }

    // Mostrar una entrada específica
    public function show(Entrada $entrada)
    {
        $entrada->load(['producto', 'usuario']);

        return view('entradas.show', compact('entrada'));
    }

    // Formulario para crear nueva entrada
    public function create()
    {
        $existencias = Existencia::with(['producto', 'cliente', 'bodega'])
            ->select('id', 'producto_id', 'cliente_id', 'bodega_id', 'cantidad_actual', 'espacio_ocupado')
            ->get();

        return view('entradas.create', compact('existencias'));
    }

    // Guardar entrada y actualizar cantidad en existencia
    public function store(Request $request)
    {
        $request->validate([
            'existencia_id' => 'required|exists:existencias,id',
            'cantidad' => 'required|numeric|min:1',
            'fecha_entrada' => 'required|date',
        ]);

        $existencia = Existencia::findOrFail($request->existencia_id);

        // Actualiza la cantidad y espacio ocupado
        $existencia->cantidad_actual += $request->cantidad;
        $existencia->save();

        // Registrar entrada
        Entrada::create([
            'existencia_id' => $existencia->id,
            'cantidad' => $request->cantidad,
            'usuario_id' => auth()->id(),
            'fecha_entrada' => $request->fecha_entrada,
            'observaciones' => $request->observaciones,
        ]);

        // Actualizar stock
        $existencia->increment('cantidad_actual', $request->cantidad);

        // Registrar movimiento tipo "entrada"
        Movimiento::create([
            'producto_id' => $existencia->producto_id, // ✅ campos reales de movimientos
            'cliente_id' => $existencia->cliente_id,
            'bodega_id' => $existencia->bodega_id,
            'tipo' => 'entrada',
            'cantidad' => $request->cantidad,
            'usuario_id' => auth()->id(),
            'fecha' => $request->fecha_entrada,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada registrada correctamente.');
    }
}
