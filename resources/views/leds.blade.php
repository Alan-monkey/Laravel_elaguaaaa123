<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de los LEDs</title>
</head>
<body>
    <h1>Historial de Estados de LEDs</h1>
    <table border="1">
        <tr>
            <th>LED</th>
            <th>Estado</th>
            <th>Fecha</th>
        </tr>
        @foreach($leds as $led)
        <tr>
            <td>{{ $led->led }}</td>
            <td>{{ $led->estado ? 'Encendido' : 'Apagado' }}</td>
            <td>{{ $led->fecha }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
