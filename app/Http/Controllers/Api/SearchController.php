<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient; // Cambié el modelo a Patient
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $patients = collect(); // Lista vacía por defecto

        // Si el campo 'text' tiene contenido, se realiza la búsqueda con case-insensitive
        if ($request->has('text') && !empty($request->get('text'))) {
            $searchText = $request->get('text');
            $patients = Patient::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchText) . '%'])->get();
        } else {
            // Si no hay texto, se muestran todos los registros
            $patients = Patient::all();
        }

        // Manejo de respuesta según el tipo de solicitud (API o vista)
        if ($request->wantsJson()) {
            return $patients->count() 
                ? response()->json($patients) 
                : response()->json(['error' => 'Sin resultados, ingrese otros campos para la búsqueda.'], 404);
        }

        // Si el campo de texto está vacío, redirigimos a la vista de pacientes
        if (!$request->has('text') || empty($request->get('text'))) {
            return redirect()->route('patients.index'); // Redirige a la vista principal de pacientes
        }

        // Si hay texto, mostramos los pacientes filtrados
        return view('index', compact('patients')); // Asegúrate de que esta ruta sea la correcta
    }
}
