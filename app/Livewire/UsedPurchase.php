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
    public $purchases, $vehicles, $purchase_id, $vehicle_id, $data;

    public $date, $time, $total_amount, $paid;

    public $engine, $title, $chassis, $model, $color, $horse_power, $maker, $tc_no, $register_no;
    public $cnic, $phone, $customer_name, $father_name, $address;
    public $owner_name, $owner_father, $owner_cnic, $owner_address;


    public function mount()
    {
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->time = Carbon::now()->format('H:i');
        $this->date = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.used-purchase');
    }

    public function updatedEngine()
    {
        $purchases = PurchaseDetail::where('engine', $this->engine)->orderby('id', 'desc')->first();
        $this->title = $purchases->vehicle->vehicle_type ?? '';
        $this->horse_power = $purchases->vehicle->horse_power ?? '';
        $this->chassis = $purchases->chassis ?? '';
        $this->model = $purchases->model ?? '';
        $this->color = $purchases->color ?? '';
        $this->vehicle_id = $purchases->vehicle_id ?? '';
        $this->title = $purchases->vehicle_type ?? '';
    }



    public function updatedCnic()
    {
        $customer = Customer::where('cnic', $this->cnic)->orderby('id', 'desc')->first();
        $this->customer_name = $customer->customer_name ?? '';
        $this->father_name = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
        $this->phone = $customer->phone ?? '';
    }

    public function updatedVehicleId()
    {
        $vehicle = VehicleType::find($this->vehicle_id);
        $this->title = $vehicle->vehicle_type ?? '';
    }

    public function updatedOwnerCnic()
    {
        $customer = Customer::where('cnic', $this->owner_cnic)->orderby('id', 'desc')->first();
        $this->owner_name = $customer->customer_name ?? '';
        $this->owner_father = $customer->father_name ?? '';
        $this->owner_address = $customer->address ?? '';
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
            // 'owner_name' => 'required',
            // 'owner_father' => 'required',
            // 'owner_cnic' => 'required',
            // 'owner_address' => 'required',
            'engine' => 'required',
            // 'title' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'maker' => 'required',
            // 'tc_no' => 'required',
            'register_no' => 'required',
        ]);

        DB::beginTransaction();

        $customer = Customer::where('cnic', $this->cnic)->first();
        if (!$customer) {
            $customer = Customer::create([
                'cnic' => $this->cnic,
                'phone' => $this->phone,
                'customer_name' => $this->customer_name,
                'father_name' => $this->father_name,
                'address' => $this->address,
            ]);
        }

        $purchase = $customer->purchaseable()->create([
            'date' => $this->date,
            'total_amount' => $this->total_amount,
            'status' => 2,
            'type' => 'Use',
        ]);

        $purchase->payments()->create([
            'date' => $this->date,
            'total' => $this->total_amount,
            'received' => $this->paid,
            'pending' => $this->total_amount - $this->paid,
        ]);

        $purchaseDetail = PurchaseDetail::create([
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
            'status' => ($this->paid > 0) ? 5 : 4,
        ]);
        DB::commit();
        return redirect('purchases');
    }
}
