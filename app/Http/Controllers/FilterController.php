<?php

namespace App\Http\Controllers;

use App\BigbyOrange;
use App\User;
use App\codingSchool;
use App\FablabUsers;
use App\ODC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function initialFilter()
    {
        $user = Auth::guard('admin')->user();
        if($user->component== 'innovation'){
            return view('admin.innovation-hub.dashboard');
        }
        if ($user->component == 'codingacademy') {
            $filteredResults = User::all();
            $centerFieldName = 'academy_location'; // Replace with the actual field name in the User model
        } elseif ($user->component == 'codingschool') {
            $filteredResults = CodingSchool::all();
            $centerFieldName = null;
        } elseif ($user->component == 'fablab') {
            $filteredResults = FablabUsers::all();
            $centerFieldName = 'affiliation'; // Replace with the actual field name in the FablabUsers model
        } elseif ($user->component == 'bigbyorange') {
            $filteredResults = BigbyOrange::all();
            $centerFieldName = null;
        } elseif ($user->component == 'digitalcenter') {
            $filteredResults = ODC::all();
            $centerFieldName = 'center'; // Replace with the actual field name in the ODC model
        }

        // Calculate ages based on birthdates
        $today = now();
        $ageData = $filteredResults->map(function ($item) use ($today) {
            return $today->diffInYears($item->birthdate);
        });

        // Organize the filtered data based on gender, residence, education level, status, and ages
        $genderData = $filteredResults->groupBy('gender')->map->count();
        $residenceData = $filteredResults->groupBy('residence')->map->count();
        $educationLevelData = $filteredResults->groupBy('education')->map->count();
        $statusData = $filteredResults->groupBy('status')->map->count();
        $centerData = $centerFieldName ? $filteredResults->groupBy($centerFieldName)->map->count() : null;
        $ageGroupData = $ageData->groupBy(function ($age) {
            // Define the age groups here
            if ($age < 20) {
                return 'Under 20';
            } elseif ($age >= 20 && $age < 30) {
                return '20-29';
            } elseif ($age >= 30 && $age < 40) {
                return '30-39';
            } else {
                return '40 and over';
            }
        })->map->count();
        // Pass the organized data to the view

        return view('admin.dashboard')->with([
            'genderData' => $genderData,
            'residenceData' => $residenceData,
            'educationLevelData' => $educationLevelData,
            'statusData' => $statusData,
            'ageGroupData' => $ageGroupData,
            'centerData' => $centerData,
        ]);
    }


    public function filterResults(Request $request)
    {
        // Retrieve the filter parameters from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $gender = $request->input('gender');
        $educationLevel = $request->input('education');
        $residence = $request->input('residence');
        $center = $request->input('center');

        $user = Auth::guard('admin')->user();
        if ($user->component == 'codingacademy') {
            $tableName = 'users';
            $centerFieldName = 'academy_location';
        } elseif ($user->component == 'codingschool') {
            $tableName = 'coding_schools';
            $centerFieldName = null;
        } elseif ($user->component == 'fablab') {
            $tableName = 'fablab_users';
            $centerFieldName = 'affiliation';
        } elseif ($user->component == 'bigbyorange') {
            $tableName = 'bigbyorange_users';
            $centerFieldName = null;
        } elseif ($user->component == 'digitalcenter') {
            $tableName = 'digitalcenter_users';
            $centerFieldName = 'center';
        }

        $query = DB::table($tableName);
        if ($center) {
            if ($user->component == 'fablab') {

                $query->where('affiliation', $center);
            } elseif ($user->component == 'codingacademy') {
                $query->where('academy_location', $center);
            } else {
                $query->where('center', $center);
            }
        }
        if ($gender) {
            $query->where('gender', $gender);
        }
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }
        if ($educationLevel) {
            $query->where('education', $educationLevel);
        }
        if ($residence) {
            if ($user->component == 'codingacademy') {
                $query->where('city', $residence);
            } else {
                $query->where('residence', $residence);
            }
        }

        $filteredResults = $query->get();

        $centerData = $centerFieldName ? $filteredResults->groupBy($centerFieldName)->map->count() : null;

        // Calculate ages based on birthdates
        $today = now();
        $ageData = $filteredResults->map(function ($item) use ($today) {
            return $today->diffInYears($item->birthdate);
        });

        // Organize the filtered data based on gender, residence, education level, and ages
        $genderData = $filteredResults->groupBy('gender')->map->count();
        if ($user->component == 'codingacademy') {
            $residenceData = $filteredResults->groupBy('city')->map->count();
        } else {
            $residenceData = $filteredResults->groupBy('residence')->map->count();
        }
        $educationLevelData = $filteredResults->groupBy('education')->map->count();
        $statusData = $filteredResults->groupBy('status')->map->count();
        $ageGroupData = $ageData->groupBy(function ($age) {
            // Define the age groups here
            if ($age < 20) {
                return 'Under 20';
            } elseif ($age >= 20 && $age < 30) {
                return '20-29';
            } elseif ($age >= 30 && $age < 40) {
                return '30-39';
            } else {
                return '40 and over';
            }
        })->map->count();

        // Pass the organized data to the view
        return view('admin.dashboard')->with([
            'genderData' => $genderData,
            'residenceData' => $residenceData,
            'educationLevelData' => $educationLevelData,
            'statusData' => $statusData,
            'ageGroupData' => $ageGroupData,
            'centerData' => $centerData,
        ]);
    }
}
