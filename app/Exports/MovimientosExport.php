<?php

namespace App\Exports;

use App\Models\Movimiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MovimientosExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Movimiento::with(['producto', 'cliente', 'bodega', 'usuario'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tipo',
            'Producto',
            'Cantidad',
            'Cliente',
            'Bodega',
            'Fecha',
            'Observaciones',
            'Usuario',
            'Creado en',
            'Actualizado en',
        ];
    }

    public function map($movimiento): array
    {
        return [
            $movimiento->id,
            ucfirst($movimiento->tipo),
            $movimiento->producto->nombre ?? '—',
            $movimiento->cantidad,
            $movimiento->cliente->nombre ?? '—',
            $movimiento->bodega->nombre ?? '—',
            optional($movimiento->fecha)->format('Y-m-d'),
            $movimiento->observaciones ?? '',
            $movimiento->usuario->name ?? '—',
            $movimiento->created_at->format('Y-m-d H:i'),
            $movimiento->updated_at->format('Y-m-d H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para encabezado (fila 1)
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF1F4E78'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],

            // Bordes para todas las celdas con datos (A1 hasta última fila columna K)
            'A1:K'.$sheet->getHighestRow() => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ],
        ];
    }
}
