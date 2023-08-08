<?php

namespace App\Exports;

//use App\User;
use App\odc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class ODCExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ODC::all();
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
            'Gender',
            'Email',
            'Passport Number',
            'Other Nationalty',
            'National ID',
            'Age',
            'Mobile',
            'Whatsapp',
            'Residence',
            'Education',
            'Employment',
            'Center',
            'Obstacles',
            'Type Of Obstacles',
            'Programming',
            'News',
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

    // public function map($row): array
    // {

    //     return [
    //         $row->id,
    //         $row->email,
    //         //    $row->password,
    //         //    $row->is_newsletter,
    //         //    $row->provider_id,
    //         //        $row->email_verification,
    //         //        $row->is_email_verified,
    //         $row->mobile,
    //         //    $row->mobile_verification,
    //         //    $row->is_mobile_verified, 
    //         $row->nationality,
    //         $row->country,
    //         //   $row->identity_number, 
    //         //   $row->residency_number,
    //         $row->year,
    //         $row->month,
    //         $row->day,
    //         $row->en_first_name,
    //         $row->en_second_name,
    //         $row->en_third_name,
    //         $row->en_last_name,
    //         $row->ar_first_name,
    //         $row->ar_second_name,
    //         $row->ar_third_name,
    //         $row->ar_last_name,
    //         $row->gender,
    //         $row->martial_status,
    //         // $row->remember_token,
    //         $row->educational_level,
    //         $row->educational_status,
    //         $row->field,
    //         $row->educational_background,
    //         $row->ar_writing,
    //         $row->ar_speaking,
    //         $row->en_writing,
    //         $row->en_speaking,
    //         $row->city,
    //         $row->address,
    //         $row->relative_mobile_1,
    //         $row->relative_relation_1,
    //         $row->fullName_1,
    //         $row->relative_mobile_2,
    //         $row->relative_relation_2,
    //         $row->fullName_2,
    //         $row->is_committed,
    //         $row->is_submitted,
    //         $row->status,
    //         $row->result_1,
    //         $row->created_at,
    //         $row->updated_at,
    //         $row->academy_location
    //     ];
    // }

}
