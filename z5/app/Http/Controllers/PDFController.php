<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Dompdf\Options;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $content = $request->input('content');

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'DejaVu Sans');
        $pdfOptions->set('isFontSubsettingEnabled', true);
        $pdfOptions->set('isFontEmbeddingEnabled', true);

        $pdf = new Dompdf($pdfOptions);
        $pdf->loadHtml('<div class="card-body">' . $content . '</div>');

        $pdf = PDF::loadView('pdf', compact('content'));

        return $pdf->download('content.pdf');
    }
}
