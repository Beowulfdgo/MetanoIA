@extends('layouts.app')

@section('title', 'Patients')

@section('content')
<div class="container">
    <!-- Barra de búsqueda -->
    <form id="search-form" class="mb-4" method="GET" action="{{ route('patients.search') }}">
        <div class="input-group">
            <input type="text" id="search-text" name="text" class="form-control" placeholder="Buscar pacientes..." value="{{ request('text') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Resultados de pacientes -->
    <div id="patients-list" class="row">
        @foreach($patients as $patient)
        <div class="col-sm-4 mb-4">
            <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                     class="card-img-top rounded-circle mx-auto d-block" 
                     src="images/{{$patient->avatar}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$patient->name}} {{$patient->apellido}}</h5>
                    <p class="card-text">Fecha de nacimiento: {{$patient->fecha_nacimiento}}</p>
                    <p class="card-text">Género: {{$patient->genero}}</p>
                    <p class="card-text">Teléfono: {{$patient->telefono}}</p>
                    <p class="card-text">Correo: {{$patient->correo_electronico}}</p>
                    <p class="card-text">Dirección: {{$patient->direccion}}</p>
                    <p class="card-text">Contacto de Emergencia: {{$patient->contacto_emergencia}}</p>
                    <a href="/patients/{{$patient->id}}" class="btn btn-secondary">Mostrar...</a>
                    <a href="/delete/{{$patient->id}}" class="btn btn-danger">Delete...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
