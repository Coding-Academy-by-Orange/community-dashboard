<?php

namespace App\Exports;

use App\codingSchool;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class CodingSchoolExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return codingSchool::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Father Name',
            'Grandfather Name',
            'Last Name',
            'Email',
            'Mobile',
            'Birthdate',
            'Gender',
            'Residence',
            'Education',
            'Major Study',
            'Status',
        ];
    }


    public function registerEvents()
    {
        return [

            AfterSheet::class    => function (AfterSheet $event) {
                $user = $this->collection();
                $event->sheet->getDelegate()->getStyle('A1:G1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
