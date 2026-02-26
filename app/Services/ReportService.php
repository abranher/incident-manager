<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportService
{
  /**
   * @param mixed $data
   * @param string $view
   * @param string $filename
   */
  public static function download(mixed $data, string $view, string $filename): StreamedResponse
  {
    $pdf = Pdf::loadView($view, $data)->setPaper('a4')->setWarnings(false);

    return response()->streamDownload(fn () => print($pdf->output()), "{$filename}.pdf");
  }
}

