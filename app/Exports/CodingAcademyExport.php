<?php

namespace App\Exports;

use App\user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class CodingAcademyExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
{
    return User::all()->map(function ($user) {
        return collect([
            'id' => $user->id,
            'en_first_name' => $user->en_first_name,
            'en_second_name' => $user->en_second_name,
            'en_third_name' => $user->en_third_name,
            'en_last_name' => $user->en_last_name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'gender' => $user->gender,
            'date_of_birth' => $user->year . '-' . $user->month . '-' . $user->day,
            'martial_status' => $user->martial_status,
            'nationality' => $user->nationality,
            'identity_number' => $user->identity_number,
            'residency_number' => $user->residency_number,
            'country' => $user->country,
            'city' => $user->city,
            'address' => $user->address,
            'academy_location' => $user->academy_location,
            'ar_writing' => $user->ar_writing,
            'en_writing' => $user->en_writing,
            'ar_speaking' => $user->ar_speaking,
            'en_speaking' => $user->en_speaking,
            'educational_level' => $user->educational_level,
            'field' => $user->field,
            'educational_status' => $user->educational_status,
            'educational_background' => $user->educational_background,
            'fullName_1' => $user->fullName_1,
            'relative_relation_1' => $user->relative_relation_1,
            'relative_mobile_1' => $user->relative_mobile_1,
            'fullName_2' => $user->fullName_2,
            'relative_relation_2' => $user->relative_relation_2,
            'relative_mobile_2' => $user->relative_mobile_2,
            'is_committed' => $user->is_committed,
            'is_submitted' => $user->is_submitted,
            'status' => $user->status,
            'result_1' => $user->result_1,
        ])->only([
            'id',
            'en_first_name',
            'en_second_name',
            'en_third_name',
            'en_last_name',
            'email',
            'mobile',
            'gender',
            'date_of_birth',
            'martial_status',
            'nationality',
            'identity_number',
            'residency_number',
            'country',
            'city',
            'address',
            'academy_location',
            'ar_writing',
            'en_writing',
            'ar_speaking',
            'en_speaking',
            'educational_level',
            'field',
            'educational_status',
            'educational_background',
            'fullName_1',
            'relative_relation_1',
            'relative_mobile_1',
            'fullName_2',
            'relative_relation_2',
            'relative_mobile_2',
            'is_committed',
            'is_submitted',
            'status',
            'result_1',
        ])->values();
    });
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
            'Mobile	',
            'Gender',
            'Birthdate',
            'Marital Status',
            'Nationality',
            'ID #',
            'Residence Number',
            'Country',
            'City',
            'Address',
            'Academy Location',
            'AR Writing',
            'EN Writing',
            'AR Speaking',
            'EN Speaking',
            'Educational Level',
            'Field',
            'Educational Status',
            'Educational Background	',
            'Relative #1 Full Name',
            'Relative #1 Relation',
            'Relative #1 Mobile',
            'Relative #2 Full Name',
            'Relative #2 Relation',
            'Relative #2 Mobile',
            'is_committed',
            'is_submitted',
            'status',
            'result_1',
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
