@props(['state'])

@php
  $colorMap = [
    'danger'  => ['bg' => '#fecaca', 'text' => '#991b1b'],
    'warning' => ['bg' => '#fef08a', 'text' => '#854d0e'],
    'info'    => ['bg' => '#bfdbfe', 'text' => '#1e40af'],
    'success' => ['bg' => '#bbf7d0', 'text' => '#166534'],
    'gray'    => ['bg' => '#e5e7eb', 'text' => '#374151'],
  ];

  $filamentColor = $state->getColor();
  $colors = $colorMap[$filamentColor] ?? $colorMap['gray'];
@endphp

<span style="
  display: inline-block;
  padding: 3px 10px;
  border-radius: 4px;
  font-size: 10px;
  font-weight: bold;
  text-transform: uppercase;
  background-color: {{ $colors['bg'] }};
  color: {{ $colors['text'] }};
">
  {{ $state->getLabel() }}
</span>

