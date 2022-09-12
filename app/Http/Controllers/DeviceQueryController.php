<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeviceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceQueryController extends Controller
{
    public function index()
    {
        return view('device-query', [
            'page_title' => 'Cihaz Sorgula | Teknik Servis',
        ]);
    }

    public function get_devices(Request $request)
    {
        $customer = Customer::where('name', '=', $request->name)
            ->where('surname', '=', $request->surname)
            ->where('phone', '=', $request->phone)->first();
        if ($customer) {
            $devices = DB::table('devices')
                ->where('customer_id', '=', $customer->id)
                ->join('device_types', 'devices.id', '=', 'device_types.id')
                ->join('device_brands', 'devices.id', '=', 'device_brands.id')
                ->select(
                    'device_types.value as device_type_value',
                    'device_brands.value as device_brand_value',
                    'devices.*',
                )
                ->get();
            $device_logs = [];
            foreach ($devices as $device) {
                $device_log = DeviceLog::where('device_id', $device->id)->get();
                $device_logs[$device->id] = $device_log;
            }
            return response()->json([
                'status' => 'success',
                'devices' => $devices,
                'device_logs' => $device_logs,
            ]);
        }

        return response()->json(['status' => 'error', 'value' => 'Bilgiler doğrulanamadı!']);
    }
}
