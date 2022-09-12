<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Device;

class DashboardController extends Controller
{
    /**
     * Render dashboard view
     *
     * @return \Illuminate\View
     */
    public function index()
    {
        return view('admin.dashboard', [
            'page_title' => 'Yönetim Paneli | Teknik Servis',
            'customer_count' => Customer::all()->count(),
            'device_count' => Device::all()->count(),
            'device_delivery_count' => Device::where('status', '=', 3)->count(),
            'giving_back' => Device::where('status', '=', 5)->count(),
        ]);
    }
}
