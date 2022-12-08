<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Residents;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared;

class ResidentImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection

    
    */

    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {

         
       

       return new Residents([
            'resident_firstname' => $row [0],
            'resident_middlename'=> $row [1],
            'resident_lastname'=> $row [2],
            'resident_gender'=> $row [3],
            'resident_birthdate'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row [4])->format('Y-m-d'),
            'resident_age'=> $row [5],
            'resident_address'=> $row [6],
            'resident_barangay'=> $row [7],
        ]);


        
    }
}
