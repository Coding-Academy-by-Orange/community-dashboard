<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;





class UsersExport implements FromCollection , WithHeadings , WithMapping ,ShouldAutoSize,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }



    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            1    => ['font' => ['size' => 16]],

        ];
    }




    public function map($row): array{
 
     return [
        $row->id,
           $row->email,
        //    $row->password,
        //    $row->is_newsletter,
        //    $row->provider_id,
        //        $row->email_verification,
        //        $row->is_email_verified,
               $row->mobile, 
            //    $row->mobile_verification,
            //    $row->is_mobile_verified, 
                  $row->nationality,
                  $row->country, 
                //   $row->identity_number, 
                //   $row->residency_number,
                  $row->year,
                  $row->month,
                  $row->day, 
                  $row->en_first_name,
                  $row->en_second_name, 
                  $row->en_third_name,
                  $row->en_last_name,
                    $row->ar_first_name,
                    $row->ar_second_name,
                    $row->ar_third_name,
                    $row->ar_last_name, 
                    $row->gender, 
                    $row->martial_status,
                    // $row->remember_token,
                    $row->educational_level,
                    $row->educational_status,
                    $row->field, 
                    $row->educational_background,
                    $row->ar_writing,
                    $row->ar_speaking,
                    $row->en_writing,
                    $row->en_speaking,
                    $row->city,
                    $row->address,
                    $row->relative_mobile_1,
                    $row->relative_relation_1,
                    $row->fullName_1,
                        $row->relative_mobile_2,
                        $row->relative_relation_2,
                        $row->fullName_2,
                        $row->is_committed,
                        $row->is_submitted,
                            $row->status,
                            $row->result_1, 
                            $row->created_at,
			    $row->updated_at,
			    $row->academy_location
    ];
 }

    public function headings(): array
    {
        return [
            'id',
            'email',
            //  'password',
                // 'is_newsletter',
                // 'provider_id',
                // 'email_verification',
                //     'is_email_verified',
                    'mobile', 
                    // 'mobile_verification',
                    // 'is_mobile_verified', 
                    'nationality',
                    'country', 
                    // 'identity_number', 
                    // 'residency_number',
                        'year',
                        'month',
                        'day', 
                        'en_first_name',
                        'en_second_name', 
                        'en_third_name',
                            'en_last_name',
                            'ar_first_name',
                            'ar_second_name',
                            'ar_third_name',
                            'ar_last_name', 
                            'gender', 
                            'martial_status',
                                #'remember_token',
                                'educational_level',
                                'educational_status',
                                'field', 
                                'educational_background',
                                    'ar_writing',
                                    'ar_speaking',
                                    'en_writing',
                                    'en_speaking',
                                        'city',
                                        'address',
                                        'relative_mobile_1',
                                        'relative_relation_1',
                                            'fullName_1',
                                            'relative_mobile_2',
                                            'relative_relation_2',
                                            'fullName_2', 
                                            'is_committed',
                                                'is_submitted',
                                                'status',
                                                'result_1', 
                                                'created_at',
						'updated_at',
						'academy_location'
        ];
    }
}
