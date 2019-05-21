<?php

namespace App\Imports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            //
            'nama' => $row[1],
            'jabatan' => $row[2],
            'umur' => $row[3],
            'alamat' => $row[4],
        ]);
    }
}
