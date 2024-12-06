@extends('layouts.app')

@section('title', 'Patients Create')

@section('content')

<form class="form-group" method="POST" action="/patients" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" class="form-control" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" class="form-control">

        <label for="telefono">Número de Teléfono:</label>
        <input type="text" name="telefono" class="form-control">

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" class="form-control">

        <label for="genero">Género:</label>
        <select name="genero" class="form-control" required>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
        </select>

        <label for="contacto_emergencia">Contacto de Emergencia:</label>
        <input type="text" name="contacto_emergencia" class="form-control">

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" class="form-control" required> 

        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
