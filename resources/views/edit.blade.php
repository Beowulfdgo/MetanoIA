@extends('layouts.app')

@section('title', 'Patients Edit')

@section('content')
<form class="form-group" method="POST" action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ $patient->name }}" class="form-control" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="{{ $patient->apellido }}" class="form-control" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ $patient->direccion }}" class="form-control">

        <label for="telefono">Número de Teléfono:</label>
        <input type="text" name="telefono" value="{{ $patient->telefono }}" class="form-control">

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" value="{{ $patient->correo_electronico }}" class="form-control">

        <label for="genero">Género:</label>
        <select name="genero" class="form-control" required>
            <option value="masculino" {{ $patient->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $patient->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ $patient->genero == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>

        <label for="contacto_emergencia">Contacto de Emergencia:</label>
        <input type="text" name="contacto_emergencia" value="{{ $patient->contacto_emergencia }}" class="form-control">

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{ $patient->fecha_nacimiento }}" class="form-control" required>

        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>
@endsection

