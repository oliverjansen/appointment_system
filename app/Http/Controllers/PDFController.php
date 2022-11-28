<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\Models\User;

class PDFController extends Controller
{
    // public function appointment_pdf(){

    //    // retreive all records from db
    //   $data = User::all();

    //   // share data to view
    //   view()->share('employee',$data);

    //   $pdf = PDF::loadView('pdf_view', $data);
    //   // download PDF file with download method
    //   return $pdf->download('pdf_file.pdf');
        
    // }
}
