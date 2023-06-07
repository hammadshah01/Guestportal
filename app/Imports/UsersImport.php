<?php

namespace App\Imports;

use App\Models\visitor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new visitor([
        
            'role'=>$row['role'],
            'name'=>$row['name'],
            'fathername'=>$row['fathername'],
            'cnic'=>$row['cnic'],
            'yearofadmission'=>$row['yearofadmission'],
            'yearofgraduation'=>$row['yearofgraduation'],
            'status'=>$row['status']


        ]);
    }
}
