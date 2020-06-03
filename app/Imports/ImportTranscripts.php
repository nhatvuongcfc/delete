<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use App\Transcript;

class ImportTranscripts implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Transcript([
            'id_transcript'=>$row[0] ?? $row['Mã bảng điểm'] ?? $row['id_transcript']??null,
            'ten_mon_hoc'=>$row[1] ?? $row['Tên môn học'] ?? $row['ten_mon_hoc']??null,
            'id_class'=>$row[2] ?? $row['Mã lớp'] ?? $row['id_class']??null,
        ]);
    }
    // public function headingRow(): int
    // {
    //     return 2;
    // }
    
}
