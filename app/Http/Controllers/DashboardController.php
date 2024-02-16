<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // You can add any logic here to fetch data for the dashboard
        // For example, fetching recent activities, statistics, etc.

        // Return the dashboard view
        return view('admin.dashboard');
    }
}

