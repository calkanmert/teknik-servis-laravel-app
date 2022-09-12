<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangeDeviceStatusRequest;
use App\Http\Requests\Admin\DeviceLogRequest;
use App\Http\Requests\Admin\DeviceRequest;
use App\Models\Customer;
use App\Models\Device;
use App\Models\DeviceBrand;
use App\Models\DeviceLog;
use App\Models\DeviceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = DB::table('devices')
            ->join('customers', 'devices.customer_id', '=', 'customers.id')
            ->join('device_types', 'devices.id', '=', 'device_types.id')
            ->join('device_brands', 'devices.id', '=', 'device_brands.id')
            ->select(
                'customers.name as customer_name',
                'customers.surname as customer_surname',
                'device_types.value as device_type_value',
                'device_brands.value as device_brand_value',
                'devices.*',
            )
            ->get();

        return view('admin.device.list', [
            'page_title' => 'Cihaz Lisesi | Teknik Servis',
            'devices' => $devices,
        ]);
    }

    public function select_customer()
    {
        return view('admin.device.select-customer', [
            'page_title' => 'Müşteri Seç | Teknik Servis',
            'customers' => Customer::All(),
        ]);
    }

    public function show($id)
    {
        $control = Device::find($id);
        if ($control) {
            $device = DB::table('devices')
                ->join('customers', 'devices.customer_id', '=', 'customers.id')
                ->join('device_types', 'devices.id', '=', 'device_types.id')
                ->join('device_brands', 'devices.id', '=', 'device_brands.id')
                ->select(
                    'customers.name as customer_name',
                    'customers.surname as customer_surname',
                    'device_types.value as device_type_value',
                    'device_brands.value as device_brand_value',
                    'devices.*',
                )
                ->where('devices.id', '=', $id)
                ->first();
            $device_logs = DB::table('device_logs')
                ->join('users', 'device_logs.user_id', '=', 'users.id')
                ->select(
                    'users.name as user_name',
                    'users.surname as user_surname',
                    'device_logs.*',
                )
                ->where('device_id', '=', $device->id)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('admin.device.show', [
                'page_title' => 'Cihaz Lisesi | Teknik Servis',
                'device' => $device,
                'device_logs' => $device_logs,
            ]);
        }

        return redirect(route('admin.device.index'));
    }

    function new ($id) {
        $customer = Customer::find($id);
        if ($customer) {
            return view('admin.device.new', [
                'page_title' => 'Cihaz Lisesi | Teknik Servis',
                'customer' => Customer::find($id),
                'device_brands' => DeviceBrand::all(),
                'device_types' => DeviceType::all(),
            ]);
        }

        return redirect(route('admin.device.select_customer'));
    }

    public function new_post(DeviceRequest $request, $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $request->validated();
            $device = Device::create([
                'customer_id' => $customer->id,
                'device_type_id' => $request->input('device_type'),
                'device_brand_id' => $request->input('device_brand'),
                'model' => strip_tags($request->input('model')),
                'includes' => strip_tags($request->input('includes')),
                'problems' => strip_tags($request->input('problems')),
                'customer_note' => strip_tags($request->input('customer_note')),
                'employee_note' => strip_tags($request->input('employee_note')),
            ]);
            return redirect(route('admin.device.show', ['id' => $device->id]));
        }

        return redirect(route('admin.device.select_customer'));
    }

    public function new_log_post(DeviceLogRequest $request, $id)
    {
        $device = Device::find($id);
        if ($device) {
            $request->validated();
            $device_log = DeviceLog::create([
                'user_id' => Auth::id(),
                'device_id' => $device->id,
                'action' => strip_tags($request->input('action')),
            ]);
        }

        return redirect()->back();
    }

    public function change_status(ChangeDeviceStatusRequest $request, $id)
    {
        $device = Device::find($id);
        if ($device) {
            $request->validated();
            Device::where('id', $device->id)->update([
                'status' => $request->input('device_status'),
            ]);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $device = Device::find($id);
        if ($device) {
            $device->delete();
        }
        return redirect(route('admin.device.index'));
    }
}
