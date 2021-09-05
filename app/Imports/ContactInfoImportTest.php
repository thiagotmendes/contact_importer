<?php

namespace App\Imports;

use App\Models\ContactInfoTest;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactInfoImportTest implements ToModel
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        echo "<pre>";
//        var_dump($row);
//        echo "</pre>";

//        return new ContactInfoTest([
//            //
//            'name'          => $row[0],
//            'date_birth'    => $row[1],
//            'phone'         => $row[2],
//            'address'       => $row[3],
//            'credcard'      => $row[4],
//            'franchise'     => $row[5],
//            'email'         => $row[6]
//        ]);
    }

}
