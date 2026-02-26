@props(['title' => 'Reporte de Incidencia', 'subtitle' => ''])

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="{{ public_path('pdf-reports.css') }}">
</head>
<body>
  <table class="header-table">
    <tr>
      <td width="50%">
        <div class="brand-title">{{ config('app.name') }}</div>
        <div style="color: #4a5568;">Sistema de Gestión de Incidencias</div>
      </td>
      <td width="50%" class="report-meta">
        <div style="font-weight: bold;">{{ strtoupper($title) }}</div>
        <div>{{ $subtitle }}</div>
        <div>Generado: {{ now('America/Caracas')->format('d/m/Y h:i A') }}</div>
      </td>
    </tr>
  </table>

  <main>
    {{ $slot }}
  </main>

  <footer style="position: fixed; bottom: -20px; left: 0; right: 0; text-align: center; color: #a0aec0; font-size: 10px;">
    Este documento es un reporte oficial generado por el Sistema.
  </footer>
</body>
</html>

