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

class ServicesDateExport implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles
{
    use Exportable;

  
    private $vaccine;
    private $vaccine_appointment;
    private $other_services;
    private $appointment_consumed;
    private $appointment_consumed_medicine;


    public function __construct() {
 

        $this->vaccine = DB::table('vaccine')
        ->join('categories_vaccine','categories_vaccine.id',"=",'vaccine.category_id')
        ->join('services','services.id',"=",'categories_vaccine.service_id')
        ->orderBy('categories_vaccine.id','ASC')
        ->get();
      
      
        $this->other_services = DB::table('other_services')
        ->join('services','services.id',"=",'other_services.service_id')
        ->orderBy('services.id','ASC')
        ->get();
      
       
    //     $this->vaccine_appointment = DB::table('appointments')
    //    ->where('service_id',1)
    //    ->where('appointment_status',"success")
    //    ->orderBy('appointment_date')
    //    ->get();
      
       
      
      
       $this->appointment_consumed = appointments::select(DB::raw("COUNT(*) as count"), DB::raw(" appointment_vaccine_type as vaccine"),DB::raw("appointment_date"),DB::raw("appointment_vaccine_category"))
       ->where('appointment_status', "success")
       ->where('service_id', 1)
       ->where('appointment_vaccine_type',"!=",null)
       ->groupBy(DB::raw("appointment_vaccine_type"))
       ->orderBy('appointment_date','ASC')
       ->get();
      
       $this->appointment_consumed_medicine = appointments::select(DB::raw("COUNT(*) as count"), DB::raw(" appointment_vaccine_type as vaccine"),DB::raw("appointment_date"),DB::raw("appointment_vaccine_category"))
       ->where('service_id', 2)
       ->where('appointment_status', "success")
       ->groupBy(DB::raw("appointment_vaccine_category"))
       ->orderBy('appointment_date','ASC')
       ->get();

    }

   
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 35,
            'C' => 20,          
            'D' => 30,          
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
        

        return view('pdf.services_excel', [
            'vaccine' => $this->vaccine,
            // 'vaccine_appointment' => $this->vaccine_appointment,
            'other_services' => $this->other_services,
            'appointment_consumed' => $this->appointment_consumed,
            'appointment_consumed_medicine' => $this->appointment_consumed_medicine

        ]);

        
    }
}
