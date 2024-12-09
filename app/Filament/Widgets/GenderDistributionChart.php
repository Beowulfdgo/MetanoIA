<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Patient;

class GenderDistributionChart extends ChartWidget
{
    // Título del widget
    protected static ?string $heading = 'Distribución de Género';

    // Tipo de gráfico: doughnut para gráfico de dona
    protected function getType(): string
    {
        return 'doughnut';
    }

    // Datos para el gráfico
    protected function getData(): array
    {
        $malePatients = Patient::where('genero', 'masculino')->count();
        $femalePatients = Patient::where('genero', 'femenino')->count();
        $otherPatients = Patient::where('genero', 'otro')->count();

        return [
            'labels' => ['Masculino', 'Femenino', 'Otro'],
            'datasets' => [
                [
                    'label' => 'Distribución de Género',
                    'data' => [$malePatients, $femalePatients, $otherPatients],
                    'backgroundColor' => ['#36A2EB', '#FF6384', '#FFCD56'], // Colores de las secciones
                ],
            ],
        ];
    }
}