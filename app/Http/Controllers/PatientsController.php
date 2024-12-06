<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Support\Facades\File;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all(); 
        return view('index', compact('patients')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName(); 
            $file->move(public_path('images'), $name);
            
            $patient = new Patient();
            $patient->name = $request->input('name');
            $patient->apellido = $request->input('apellido');
            $patient->avatar = $name; 
            $patient->fecha_nacimiento = $request->input('fecha_nacimiento');
            $patient->genero = $request->input('genero');
            $patient->telefono = $request->input('telefono');
            $patient->correo_electronico = $request->input('correo_electronico');
            $patient->direccion = $request->input('direccion');
            $patient->contacto_emergencia = $request->input('contacto_emergencia');

            $patient->save(); 

            return 'Guardado'; 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
       // return 'tengo que regresar el id';
       //return view("show");
       //$patient = Patient::find($id);
       //return $patient;
        return view('show', compact('patient'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //return $trainer;
        return view('edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        // Llenar el objeto Patient con los datos del formulario, excepto el campo 'avatar'
        $patient->fill($request->except('avatar'));
    
        // Verificar si se subió un archivo en el campo 'avatar'
        if ($request->hasFile('avatar')) {
            // Si el paciente ya tiene una imagen asociada, eliminarla
            if ($patient->avatar && file_exists(public_path('images/' . $patient->avatar))) {
                // Eliminar la imagen anterior
                unlink(public_path('images/' . $patient->avatar));
            }
    
            // Obtener el archivo subido
            $file = $request->file('avatar');
            // Usar la función time() para obtener el timestamp y concatenarlo con el nombre del archivo
            $name = time() . '_' . $file->getClientOriginalName();
    
            // Asignar el nombre del archivo a la propiedad 'avatar' en el objeto Patient
            $patient->avatar = $name;
    
            // Mover el archivo a la carpeta 'images' dentro de la carpeta 'public'
            $file->move(public_path('images'), $name);
        }
    
        // Guardar los cambios en la base de datos
        $patient->save();
    
        // Redirigir al usuario a la vista de detalles del paciente actualizado
        return redirect('patients/' . $patient->id);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        
        if ($patient) {
            $file_path = public_path('images/' . $patient->avatar);
    
            if (File::exists($file_path)) {
                File::delete($file_path);
                echo 'File deleted successfully.';
            } else {
                echo 'File does not exist.';
            }
    
            if ($patient->delete()) {
                return redirect('patients/')->with('success', 'Paciente eliminado exitosamente');
            } else {
                return redirect('patients/')->with('error', 'El paciente con ID ' . $id . ' no se pudo borrar');
            }
        } else {
            return redirect('patients/')->with('error', 'Paciente no encontrado');
        }
    }
}    
