<?php

namespace App\Imports;

use App\Models\Event;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class EventImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Event([
            'name' => $row[0],
            'description' => $row[1],
            'start_day' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'number_of_participants' => $row[3],
            'public_time' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
            'status' => $row[5],
        ]);
    }
}
