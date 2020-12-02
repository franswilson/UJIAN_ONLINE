<?php

namespace App\Imports;

use App\Soal;
use App\Modul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoalImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $soal = Modul::where('id',$row[0])->first();
        if($soal){
            return new Soal([
                'id_modul' => $row[0],
                'soal' => $row[1],
                'a' => $row[2],
                'b' => $row[3],
                'c' => $row[4],
                'd' => $row[5],
                'e' => $row[6],
                'knc_jawaban' => $row[7],
            ]);
        }
    }
    public function startRow(): int
    {
        return 2;
    }
}
