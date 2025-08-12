<?php

namespace App\Exports;

use App\Models\Existencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles; // <-- IMPORTA ESTA INTERFAZ
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExistenciasExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        // Cargar las relaciones para acceder a los nombres
        return Existencia::with(['producto', 'cliente', 'bodega'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Producto',
            'Cliente',
            'Bodega',
            'Cantidad Actual',
            'Espacio Ocupado',
            'Creado en',
            'Actualizado en',
        ];
    }

    public function map($existencia): array
    {
        return [
            $existencia->id,
            $existencia->producto->nombre ?? '',
            $existencia->cliente->nombre ?? '',
            $existencia->bodega->nombre ?? '',
            $existencia->cantidad_actual,
            $existencia->espacio_ocupado,
            $existencia->created_at ? $existencia->created_at->format('Y-m-d H:i:s') : '',
            $existencia->updated_at ? $existencia->updated_at->format('Y-m-d H:i:s') : '',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la fila de encabezados (fila 1)
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

            // Bordes para todas las celdas con datos (de A1 hasta la última fila en columna H)
            'A1:H'.$sheet->getHighestRow() => [
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
