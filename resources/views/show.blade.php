@extends('layouts.app')

@section('title', 'Patient')

@section('content')
    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
         class="card-img-top rounded-circle mx-auto d-block" 
         src="../images/{{$patient->avatar}}" alt="Patient Avatar">

    <h5 class="text-center">{{$patient->name}} {{$patient->apellido}}</h5>

    <div class="text-center">
        <p>Fecha de nacimiento: {{$patient->fecha_nacimiento}}</p>
        <p>Género: {{$patient->genero}}</p>
        <p>Teléfono: {{$patient->telefono}}</p>
        <p>Correo: {{$patient->correo_electronico}}</p>
        <p>Dirección: {{$patient->direccion}}</p>
        <p>Contacto de Emergencia: {{$patient->contacto_emergencia}}</p>
        
        <a href="/delete/{{$patient->id}}" class="btn btn-primary">Eliminar</a>
        <a href="/patients/{{$patient->id}}/edit" class="btn btn-secondary">Editar...</a>
    </div>

    <div class="text-center" style="margin-top: 20px;">
        <a href="{{ route('generate.pdf', $patient->id) }}" class="btn btn-sm btn-primary">Generar PDF</a>
    </div>
@endsection

