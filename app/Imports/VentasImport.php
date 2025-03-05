<?php

namespace App\Imports;

use App\Models\ventas;
use Maatwebsite\Excel\Concerns\ToModel;

class VentasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ventas([
            //
        ]);
    }
}
