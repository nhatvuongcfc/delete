<?php

namespace App\Exports;

use App\Transcript;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;



class ExportTranscripts implements FromCollection, WithHeadings,ShouldAutoSize,WithEvents,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $transcript= Transcript::all();
        // return DB::table('transcripts')
        //     ->join('class','transcripts.id_class','class.id_class')
        //     ->select('transcripts.id_transcript','transcripts.ten_mon_hoc','class.name_class')
        //     ->get();
    }
    public function headings(): array
    {
        return ['Mã bảng điểm', 'Tên môn học', 'Lớp'];

    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
    public function map($transcript): array
    {
        return [
            Date::dateTimeToExcel($transcript->created_at),
        ];
    }
}
?>
