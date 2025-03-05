<?php

namespace App\Imports;

use App\Models\camionetas;
use Maatwebsite\Excel\Concerns\ToModel;

class CamionetasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new camionetas([
            //
        ]);
    }
}
