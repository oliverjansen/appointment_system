<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\appointments;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AppointmentDataExport implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles
{
    use Exportable;

    private $appointmentsadmins;

    public function __construct() {
        $this->appointmentsadmins = DB::table('users')
        ->join('appointments','users.id',"=",'appointments.user_id')
        ->get();

    
    }
   
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 15,
            'C' => 30,          
            'D' => 20,          
            'E' => 20, 
            'F' => 20,          
            'G' => 20,          
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }


    
    public function view () : View 
    {
        

        return view('pdf.appointment_excel', [
            'appointments_admin' => $this->appointmentsadmins
        ]);

        
    }
}
