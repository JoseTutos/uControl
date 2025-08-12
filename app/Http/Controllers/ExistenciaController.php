<?php

namespace App\Http\Controllers;

use App\Exports\ExistenciasExport;
use App\Models\Bodega;
use App\Models\Cliente;
use App\Models\Existencia;
use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExistenciaController extends Controller
{
    public function index()
    {
        $existencias = Existencia::with(['producto', 'cliente', 'bodega'])->get();

        return view('existencias.index', compact('existencias'));
    }

    public function exportExcel()
    {
        $nombreArchivo = 'existencias_'.date('Ymd_His').'.xlsx';

        return Excel::download(new ExistenciasExport, $nombreArchivo);
    }

    public function show(Existencia $existencia)
    {
        // Carga las relaciones para mostrar nombres
        $existencia->load(['producto', 'cliente', 'bodega']);

        return view('existencias.show', compact('existencia'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $bodegas = Bodega::all();

        return view('existencias.create', compact('productos', 'clientes', 'bodegas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'bodega_id' => 'required|exists:bodegas,id',
            'cantidad_actual' => 'required|numeric|min:0',
            'espacio_ocupado' => 'required|numeric|min:0',
            'stock_minimo' => 'required|numeric|min:0',
        ]);

        $existencia = Existencia::create($validated);

        Movimiento::create([
            'producto_id' => $existencia->producto_id,
            'cliente_id' => $existencia->cliente_id,
            'bodega_id' => $existencia->bodega_id,
            'tipo' => 'ingreso',
            'cantidad' => $existencia->cantidad_actual,
            'usuario_id' => auth()->id(),
            'fecha' => now(),
            'observaciones' => 'Registro inicial de stock',
        ]);

        return redirect()->route('existencias.index')->with('success', 'Existencia registrada correctamente.');
    }

    public function edit(Existencia $existencia)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $bodegas = Bodega::all();

        return view('existencias.edit', compact('existencia', 'productos', 'clientes', 'bodegas'));
    }

    public function update(Request $request, Existencia $existencia)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'bodega_id' => 'required|exists:bodegas,id',
            'cantidad_actual' => 'required|numeric|min:0',
            'espacio_ocupado' => 'required|numeric|min:0',
            'stock_minimo' => 'required|numeric|min:0',
        ]);

        $existencia->update($validated);

        return redirect()->route('existencias.index')->with('success', 'Existencia actualizada correctamente.');
    }
}
