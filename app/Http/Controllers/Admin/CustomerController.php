<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\EditCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.list', [
            'page_title' => 'Müşteri Lisesi | Teknik Servis',
            'customers' => Customer::All(),
        ]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $devices = DB::table('devices')
                ->join('device_types', 'devices.id', '=', 'device_types.id')
                ->join('device_brands', 'devices.id', '=', 'device_brands.id')
                ->select(
                    'device_types.value as device_type_value',
                    'device_brands.value as device_brand_value',
                    'devices.*',
                )
                ->where('devices.customer_id', '=', $customer->id)
                ->get();
            return view('admin.customer.show', [
                'page_title' => $customer->name . ' ' . $customer->surname . ' | Teknik Servis',
                'customer' => $customer,
                'devices' => $devices,
            ]);
        }
        return redirect(route('admin.customer.index'));
    }

    function new () {
        return view('admin.customer.new', [
            'page_title' => 'Yeni Müşteri | Teknik Servis',
        ]);
    }

    public function new_post(CustomerRequest $request)
    {
        $credentials = $request->validated();
        $customer = Customer::create([
            'name' => strip_tags($request->input('name')),
            'surname' => strip_tags($request->input('surname')),
            'phone' => strip_tags($request->input('phone')),
            'email' => strip_tags($request->input('email')),
            'address' => strip_tags($request->input('address')),
        ]);

        return redirect(route('admin.customer.show', ['id' => $customer->id]));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            return view('admin.customer.edit', [
                'page_title' => 'Düzenle | Teknik Servis',
                'customer' => $customer,
            ]);
        }
        return redirect(route('admin.customer.index'));
    }

    public function edit_post(EditCustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $credentials = $request->validated();
            $affectedRows = Customer::where('id', $id)->update([
                'name' => strip_tags($request->input('name')),
                'surname' => strip_tags($request->input('surname')),
                'phone' => strip_tags($request->input('phone')),
                'email' => strip_tags($request->input('email')),
                'address' => strip_tags($request->input('address')),
            ]);
            Session::flash('status', [
                'class' => 'alert-success',
                'message' => 'Güncelleme işlemi başarılı!',
            ]);
            return redirect()->back();
        }
        return redirect(route('admin.customer.index'));
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
        }
        return redirect(route('admin.customer.index'));
    }
}
