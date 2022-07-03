<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $pdf = PDF::loadView('admin.admission.admission-pdf');

        return $pdf->download('admission-pdf.pdf');
    }
}
