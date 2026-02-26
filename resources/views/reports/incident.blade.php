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
        <td>{{ user_label($incident->reporter->name, $incident->reporter->email) }}</td>
      </tr>
    </tbody>
  </table>

  <div class="section-title">Cronología y Seguimiento</div>

  <table class="table">
    <tbody>
      <tr>
        <td style="font-weight: bold; width: 30%;">Fecha de Creación:</td>
        <td style="width: 70%;">{{ $incident->created_at->setTimezone('America/Caracas')->format('d/m/Y - g:i A') }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Última Actualización:</td>
        <td style="color: #3182ce;">{{ $incident->updated_at->setTimezone('America/Caracas')->diffForHumans() }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Resuelta el:</td>
        <td>
          @if($incident->closed_at)
            {{ \Carbon\Carbon::parse($incident->closed_at)->setTimezone('America/Caracas')->format('d/m/Y - g:i A') }}
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

  <div class="section-title" style="margin-top: 20px;">Seguimiento de la Incidencia (Historial)</div>

  <table class="table">
    <thead>
      <tr>
        <th style="width: 10%;">Fecha</th>
        <th style="width: 18%;">Técnico</th>
        <th style="width: 24%;">Estado</th>
        <th style="width: 30%;">Comentario</th>
        <th style="width: 18%;">Adjunto</th>
      </tr>
    </thead>
    <tbody>
      @forelse($incident->updates()->orderBy('created_at', 'desc')->get() as $update)
        <tr>
          <td style="font-size: 10px;">
            {{ $update->created_at->setTimezone('America/Caracas')->format('d/m/Y') }}<br>
            <span style="color: #718096;">{{ $update->created_at->setTimezone('America/Caracas')->format('h:i A') }}</span>
          </td>
          <td style="font-weight: bold;">
            {{ "{$update->user->name} ({$update->user->email})" }}
          </td>
          <td>
            <x-pdf-badge :state="$update->new_status" />
          </td>
          <td style="font-size: 10px; line-height: 1.2;">
            {!! $update->comment !!}
          </td>
          <td style="text-align: center; vertical-align: middle;">
            @if($update->attachments && count($update->attachments) > 0)
              @php $firstPhoto = $update->attachments[0]; @endphp
              <img
                src="{{ public_path('storage/' . $firstPhoto) }}"
                style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #cbd5e0; border-radius: 4px;"
              >
              @if(count($update->attachments) > 1)
                <div style="font-size: 8px; color: #3182ce; margin-top: 2px;">+{{ count($update->attachments) - 1 }} más</div>
              @endif
            @else
              <span style="color: #cbd5e0; font-size: 8px;">Sin fotos</span>
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" style="text-align: center; color: #718096; padding: 20px;">
            No se han registrado avances técnicos.
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>

</x-pdf-layout>

