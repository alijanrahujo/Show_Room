<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Customer;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;

class UsedPurchase extends Component
{
    public $vehicles, $purchase_id, $vehicle_id;
    public $date, $time, $total_amount, $paid;
    public $engine, $title, $chassis, $model, $color, $horse_power, $maker, $tc_no, $register_no;
    public $cnic, $phone, $customer_name, $father_name, $address;
    public $owner_name, $owner_father, $owner_cnic, $owner_address, $owner_phone, $extra;

    public function mount()
    {
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->time = Carbon::now()->format('H:i');
        $this->date = Carbon::now()->format('Y-m-d');
        $this->maker = 'Honda';
    }

    public function render()
    {
        return view('livewire.used-purchase');
    }

    public function updatedChassis()
    {
        $purchaseDetail = PurchaseDetail::where('chassis', $this->chassis)->latest()->first();
        if ($purchaseDetail) {
            $this->title = $purchaseDetail->vehicle->vehicle_type;
            $this->horse_power = $purchaseDetail->vehicle->horse_power;
            $this->engine = $purchaseDetail->engine;
            $this->model = $purchaseDetail->model;
            $this->color = $purchaseDetail->color;
            $this->vehicle_id = $purchaseDetail->vehicle_id;
            // $this->title = $purchaseDetail->vehicle_type;
        }
    }

    public function updatedCnic($cnic)
    {
        $customer = Customer::where('cnic', $cnic)->latest()->first();
        $this->customer_name = $customer->customer_name ?? '';
        $this->father_name = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
        $this->phone = $customer->phone ?? '';

        $this->updatedOwnerCnic();
    }

    public function updatedOwnerCnic()
    {
        $this->owner_cnic = $this->cnic;
        $this->owner_name = $this->customer_name;
        $this->owner_father = $this->father_name;
        $this->owner_address = $this->address;
        $this->owner_phone = $this->phone;
    }

    public function updatedVehicleId($id)
    {
        $vehicle = VehicleType::select('vehicle_type')->where('id', $id)->first();
        $this->title = $vehicle->vehicle_type ?? '';
    }

    public function submit()
    {
        $this->validate([
            'cnic' => 'required',
            'phone' => 'required',
            'customer_name' => 'required',
            'father_name' => 'required',
            'address' => 'required',
            'vehicle_id' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'maker' => 'required',
        ]);

        DB::beginTransaction();

        $customer = Customer::firstOrNew(['cnic' => $this->cnic], [
            'phone' => $this->phone,
            'customer_name' => $this->customer_name,
            'father_name' => $this->father_name,
            'address' => $this->address,
        ]);
        $customer->save();

        $purchase = $customer->purchaseable()->create([
            'date' => $this->date,
            'total_amount' => $this->total_amount,
            'status' => 2,
            'type' => 'Used',
        ]);

        $purchase->payments()->create([
            'date' => $this->date,
            'total' => $this->total_amount,
            'received' => $this->paid,
            'pending' => $this->total_amount - $this->paid,
            'status' => ($this->total_amount == $this->paid) ? 6 : 5,
        ]);

        PurchaseDetail::create([
            'purchase_id' => $purchase->id,
            'vehicle_id' => $this->vehicle_id,
            'customer_id' => $customer->id,
            'cnic' => $this->cnic,
            'phone' => $this->phone,
            'name' => $this->customer_name,
            'father_name' => $this->father_name,
            'address' => $this->address,
            'owner_name' => $this->owner_name,
            'owner_father' => $this->owner_father,
            'owner_cnic' => $this->owner_cnic,
            'owner_address' => $this->owner_address,
            'owner_phone' => $this->owner_phone,
            'engine' => $this->engine,
            'title' => $this->title,
            'chassis' => $this->chassis,
            'model' => $this->model,
            'color' => $this->color,
            'horse_power' => $this->horse_power,
            'maker' => $this->maker,
            'tc_no' => $this->tc_no,
            'register_no' => $this->register_no,
            'type' => 'Used',
            'purchase_amount' => $this->total_amount,
            'purchase_tax' => 0,
            'total' => $this->total_amount,
            'status' => 2,
        ]);

        DB::commit();
        return redirect()->route('purchases.show', $purchase->id);
    }

    public function updated($field, $value)
    {
        if (in_array($field, ['customer_name', 'father_name', 'cnic', 'phone', 'address'])) {
            $this->updatedOwnerCnic();
        }
    }
}
