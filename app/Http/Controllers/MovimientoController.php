<?php

namespace App\Http\Controllers;

use App\Exports\MovimientosExport;
use App\Models\Movimiento;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['producto', 'cliente', 'bodega', 'usuario'])
            ->orderByDesc('fecha')
            ->get();

        return view('movimientos.index', compact('movimientos'));
    }

    public function exportMovimientos()
    {
        $nombreArchivo = 'movimientos_'.date('Ymd_His').'.xlsx';

        return Excel::download(new MovimientosExport, $nombreArchivo);
    }

    public function export()
    {
        $movimientos = Movimiento::with(['producto', 'cliente', 'bodega', 'usuario'])->get();

        $csvData = [];
        $csvData[] = ['Fecha', 'Tipo', 'Producto', 'Cliente', 'Bodega', 'Cantidad', 'Usuario', 'Observaciones'];

        foreach ($movimientos as $m) {
            $csvData[] = [
                $m->fecha,
                $m->tipo,
                $m->producto->nombre,
                $m->cliente->nombre,
                $m->bodega->nombre,
                $m->cantidad,
                $m->usuario->name ?? 'N/A',
                $m->observaciones,
            ];
        }

        $filename = 'movimientos_'.now()->format('Ymd_His').'.csv';
        $handle = fopen('php://temp', 'r+');

        foreach ($csvData as $line) {
            fputcsv($handle, $line);
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
