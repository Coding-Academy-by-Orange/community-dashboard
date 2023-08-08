<?php

namespace App\Exports;

use App\FablabUsers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class FabLabExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return FablabUsers::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Father Name',
            'Grandfather Name',
            'Last Name',
            'Nationality',
            'Affiliation',
            'Gender',
            'Email',
            'Passport Number',
            'National ID',
            'Age',
            'Mobile',
            'Whatsapp',
            'Residence',
            'Education',
            'Major Study',
            'Employment',
            'Program',
            'Technology Type',
            'Idea Description',
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
