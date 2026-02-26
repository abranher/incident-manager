<x-pdf-layout :title="'Detalle de Incidencia'" :subtitle="$incident->title">

  <div class="section-title">Información General</div>

  <table class="table">
    <thead>
      <tr>
        <th>Campo</th>
        <th>Detalle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-weight: bold;">Título:</td>
        <td>{{ $incident->title }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Estado:</td>
        <td>
          <x-pdf-badge :state="$incident->status" />
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Prioridad:</td>
        <td>
          <x-pdf-badge :state="$incident->priority" />
        </td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Departamento:</td>
        <td>{{ $incident->department->name ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Reportado por:</td>
        <td>{{ "{$incident->reporter->name} ({$incident->reporter->email})" }}</td>
      </tr>
    </tbody>
  </table>

  <div class="section-title">Cronología y Seguimiento</div>

  <table class="table">
    <tbody>
      <tr>
        <td style="font-weight: bold; width: 30%;">Fecha de Creación:</td>
        <td style="width: 70%;">{{ $incident->created_at->format('d/m/Y - g:i A') }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Última Actualización:</td>
        <td style="color: #3182ce;">{{ $incident->updated_at->diffForHumans() }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Resuelta el:</td>
        <td>
          @if($incident->closed_at)
            {{ \Carbon\Carbon::parse($incident->closed_at)->format('d/m/Y - g:i A') }}
          @else
            <span style="color: #718096; font-style: italic;">No finalizada</span>
          @endif
        </td>
      </tr>
    </tbody>
  </table>

  <div class="section-title">Descripción</div>

  <div style="padding: 10px; border: 1px solid #edf2f7;">
    {!! $incident->description !!}
  </div>

  <x-pdf-hr />

  @if($incident->attachments && count($incident->attachments) > 0)
    <div class="section-title">Evidencias Fotográficas</div>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
      <tr>
        @foreach($incident->attachments as $photo)
          <td style="border: 2px solid #edf2f7; padding: 15px; text-align: center; vertical-align: top; width: 50%;">
            <div style="font-size: 9px; color: #718096; margin: 8px; font-weight: bold;">
              EVIDENCIA #{{ $loop->iteration }}
            </div>
            <img
              src="{{ public_path('storage/' . $photo) }}"
              style="max-width: 300px; height: auto; display: block; margin: 0 auto; border: 1px solid #cbd5e0;"
            >
          </td>

          @if($loop->iteration % 2 == 0 && !$loop->last)
            </tr><tr>
          @endif
        @endforeach

        @if(count($incident->attachments) % 2 != 0)
          <td style="width: 50%; border: none;"></td>
        @endif
      </tr>
    </table>
  @endif

</x-pdf-layout>

