<?php

namespace App\Http\Controllers\InnovationHub;

use App\Activity;
use App\Http\Controllers\Controller;
use App\InnovationHub;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
       $applicants = InnovationHub::all();
       $statusData = $applicants->groupBy('status')->map->count();
         $ageData = $applicants->groupBy('gender')->map->count();
            $genderData = $applicants->groupBy('residence')->map->count();
        $educationLevelData = $applicants->groupBy('education')->map->count();
        $residenceData = $applicants->groupBy('residence')->map->count();
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
        return view('admin.innovation-hub.dashboard', compact('ageGroupData','statusData','ageData', 'genderData', 'educationLevelData', 'residenceData'));
    }

    public function viewApplications()
    {
        $applications = InnovationHub::all();
        return view('admin.innovation-hub.applications.index', compact('applications'));
    }

    public function viewActivities()
    {
        $activities = Activity::where('component')->get();
        return view('admin.innovation-hub.activities.index',compact('activities'));
    }

    public function addActivity()
    {
        return view('admin.innovation-hub.activities.add');
    }

    public function viewActivity($id)
    {
        return view('admin.innovation-hub.activities.view');
    }

    public function editActivity($id)
    {
        return view('admin.innovation-hub.activities.edit');
    }

    public function viewLocations()
    {
        return view('admin.innovation-hub.locations.index');
    }

    public function addLocation()
    {
        return view('admin.innovation-hub.locations.add');
    }

    public function viewLocation($id)
    {
        return view('admin.innovation-hub.locations.view');
    }

    public function editLocation($id)
    {
        return view('admin.innovation-hub.locations.edit');
    }
}
