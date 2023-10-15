<?php

namespace App\Exports;

use App\BigbyOrange;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class BigExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BigbyOrange::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Evaluation Purposes',
            'First Name',
            'Father Name',
            'Grandfather Name',
            'Last Name',
            'Linkedin Profile',
            'Nationality',
            'Gender',
            'Email',
            'Passport Number',
            'National ID',
            'Birthdate',
            'Mobile',
            'Residence',
            'Education',
            'Major Study',
            'Employment',
            'Person With Disability',
            'Male Co_Founders',
            'Female_Co_Founders',
            'Position',
            'ProvideOfPosition',
            'Startup',
            'Startup Name',
            'Website',
            'Social Media',
            'Problem your Startup',
            'Describe your Solution',
            'MVP Demo',
            'Startup Registered',
            'Registration Number',
            'Startup Serve',
            'Funds',
            'Source Funds',
            'Amount of Funds',
            'New Funds',
            'Markets',
            'Revenue',
            'Milestones and Achievements',
            'Describe the Effect',
            'Business Opportunities',
            'Specify Units',
            'Expectations',
            'Consent to Receiving',
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
