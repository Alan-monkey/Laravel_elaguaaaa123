<?php

namespace App\Imports;

use App\Models\garrafones;
use Maatwebsite\Excel\Concerns\ToModel;

class GarrafonesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new garrafones([
            //
        ]);
    }
}
