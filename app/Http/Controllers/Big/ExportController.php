<?php

namespace App\Http\Controllers\Big;

use App\Exports\BigExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new BigExport, 'applicants.xlsx');
    }
}

