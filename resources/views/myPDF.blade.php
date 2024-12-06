<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Paciente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalles del Paciente</h1>
        <p>Fecha de generación del reporte: {{ $date }}</p>

        <h2>Información General</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->apellido }}</td>
                    <td>
                        @if ($patient->avatar)
                            <img src="{{ public_path('images/' . $patient->avatar) }}" style="width: 50px; height: 50px;" alt="Avatar">
                        @else
                            <span>No tiene avatar</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <h2>Detalles Adicionales</h2>
        <p><strong>Dirección:</strong> {{ $patient->direccion }}</p>
        <p><strong>Teléfono:</strong> {{ $patient->telefono }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $patient->correo_electronico }}</p>
        <p><strong>Género:</strong> {{ ucfirst($patient->genero) }}</p>
        <p><strong>Contacto de Emergencia:</strong> {{ $patient->contacto_emergencia }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $patient->fecha_nacimiento }}</p>
    </div>
</body>
</html>





