<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function create()
    {

        $categorias = Categoria::all();
        $clientes = Cliente::all();

        return view('productos.create', compact('categorias', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_producto' => 'required|string|max:50|unique:productos,codigo_producto',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|string',
            'valor_unitario' => 'required|numeric',
            'iva' => 'required|numeric',
            'observaciones' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Guarda el producto
        Producto::create($request->all());

        // Redirige con mensaje de éxito
        return redirect()->route('productos.create')->with('success', 'Producto registrado exitosamente.');
    }

    public function index()
    {
        $productos = Producto::with('categoria')->get();

        return view('productos.index', compact('productos'));

    }

    public function edit(Producto $producto)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $clientes = Cliente::all();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_producto' => 'required|string|max:50|unique:productos,codigo_producto',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|string',
            'valor_unitario' => 'required|numeric',
            'iva' => 'required|numeric',
            'observaciones' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::all();

        return view('productos.show', compact('producto', 'categorias'));
    }
}
