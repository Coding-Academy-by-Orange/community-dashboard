<?php
namespace App\Http\Controllers\Big;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BigImport;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new BigImport, $request->file('file'));

        return back()->with('success', 'Data imported successfully!');
    }
}
