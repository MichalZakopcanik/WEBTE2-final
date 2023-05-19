<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $content = $request->input('content');
        $pdf = PDF::loadView('pdf', compact('content'));

        return $pdf->download('content.pdf');
    }
}
