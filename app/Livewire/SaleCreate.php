<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\VehicleType;

class SaleCreate extends Component
{
    public $customers;
    public $purchases;
    public $vehicles;

    public $purchase;
    public $purchased;

    public $cnic, $phone, $customer, $father, $address;

    public $purchase_id, $vehicle_id, $title, $engine, $chassis, $model, $color, $purchase_amount;

    public function mount()
    {
        $this->customers = Customer::pluck('customer_name', 'id');
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->purchase = 0;
        $this->purchases = collect();
        $this->purchased = collect();
    }
    public function render()
    {
        return view('livewire.sale-create');
    }

    public function updatecnic()
    {
        $customer = Customer::where('cnic',$this->cnic)->first();
        $this->phone = $customer->phone ?? '';
        $this->customer = $customer->customer_name ?? '';
        $this->father = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
    }

    public function updatephone()
    {
        $customer = Customer::where('phone',$this->phone)->first();
        if(!$this->customer)
        {
            $this->cnic = $customer->cnic ?? '';
            $this->customer = $customer->customer_name ?? '';
            $this->father = $customer->father_name ?? '';
            $this->address = $customer->address ?? '';
        }
    }

    public function updatedVehicleId($id)
    {
        $this->purchases = Purchase::where(['vehicle_id' => $id, 'status' => 1])->get()->pluck('FullTitle', 'id');
    }

    public function addrecord()
    {
        $this->purchased[] = Purchase::where(['id' => $this->purchase_id])->first();
        $this->purchase_id = null;
    }

    public function updatedPurchase($id)
    {
        $purchased = Purchase::find($id);
        $this->title = $purchased->title ?? '';
        $this->engine = $purchased->engine ?? '';
        $this->chassis = $purchased->chassis ?? '';
        $this->model = $purchased->model ?? '';
        $this->color = $purchased->color ?? '';
        $this->purchase_amount = $purchased->payments->sum('total') ?? '';
    }

}
