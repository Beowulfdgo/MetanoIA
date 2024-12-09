<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use Carbon\Carbon;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Contar el total de pacientes
        $patientCount = Patient::count();

        // Contar los nuevos pacientes del mes actual
        $newPatients = Patient::whereMonth('created_at', Carbon::now()->month)
                              ->whereYear('created_at', Carbon::now()->year)
                              ->count();

        // Calcular el promedio de edad
        $averageAge = Patient::all()->avg(function ($patient) {
            return Carbon::parse($patient->fecha_nacimiento)->age; // Usar el campo correcto
        });

        return [
            Stat::make('Total Patients', $patientCount), // Número total de pacientes
            Stat::make('New Patients This Month', $newPatients), // Nuevos pacientes del mes
            Stat::make('Average Age', $averageAge ? round($averageAge, 2) : 'N/A') // Promedio de edad o N/A si no hay datos
        ];
    }
}


