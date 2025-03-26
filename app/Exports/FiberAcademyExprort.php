<?php

namespace App\Exports;

use App\FiberAcademy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class FiberAcademyExprort implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return FiberAcademy::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'full_name',
            'Gender',
            'Email',
            'age',
            'phone_number',
            'residence',
            'education',
            'experience_in_marketing',
            'courses_you_take',
            'take_similar_courses',
            'have_disability',
            'disability_type',
            'specialization',
            'Created_at',
            'Updated_at'
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
