<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //

    public function index($path = null)
    {
        $landingPages = [
            'bigbyorange' => 'bigbyorange',
            'codingacademy' => 'codingacademy',
            'fablab' => 'fablab',
            'innovationhub' => 'innovationhub',
            // Add more paths and their corresponding blade file names here
        ];

        // Get the current path
        $currentPath = strtolower(trim($path));

        // Check if the current path is in the landing pages array
        if (array_key_exists($currentPath, $landingPages)) {
            // Return the corresponding landing page view
            return view($landingPages[$currentPath]);
        }
    }


}
