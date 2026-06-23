<?php

namespace App\Imports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'f_name' => $row[0],
            'm_name' => $row[1],
            'l_name' => $row[2],
            'usertype' => $row[3],
            // Convert Excel serial date to Y-m-d format
            'dob' => Date::excelToDateTimeObject($row[4])->format('Y-m-d'),
            'file_name' => $row[5],
            'email' => $row[6],
            'phone' => $row[7],
            'password' => $row[8],
        ]);
    }
}
