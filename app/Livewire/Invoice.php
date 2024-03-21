<?php

namespace App\Livewire;

use App\Models\Invoice as ModelsInvoice;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\SaleDetail;
use App\Models\VehicleType;

class Invoice extends Component
{
    public $id, $vehicles, $engine, $chassis, $model, $color, $horse_power, $title, $vehicle_id,
        $buyer_name, $buyer_father, $buyer_phone, $buyer_cnic, $buyer_address, $maker, $register_no, $status, $date;

    function mount()
    {
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->date = Carbon::now()->format('Y-m-d');
        $this->maker = 'Honda';
        $this->status = 10;
    }

    public function render()
    {
        return view('livewire.invoice');
    }

    public function updatedChassis()
    {
        $saleDetail = SaleDetail::where('chassis', $this->chassis)->with('sale.customer')->latest()->first();
        if ($saleDetail) {
            $this->id = $saleDetail->id;
            $this->title = $saleDetail->vehicle->vehicle_type;
            $this->chassis = $saleDetail->chassis;
            $this->engine = $saleDetail->engine;
            $this->horse_power = $saleDetail->vehicle->horse_power;
            $this->model = $saleDetail->model;
            $this->color = $saleDetail->color;
            $this->vehicle_id = $saleDetail->vehicle_id;
            $this->buyer_name = $saleDetail->sale->customer->customer_name;
            $this->buyer_father = $saleDetail->sale->customer->father_name;
            $this->buyer_cnic = $saleDetail->sale->customer->cnic;
            $this->buyer_phone = $saleDetail->sale->customer->phone;
            $this->buyer_address = $saleDetail->sale->customer->address;
        }
    }

    function submit()
    {
        // dd($this);
        $this->validate([
            'chassis' => 'required',
            'engine' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'buyer_name' => 'required',
            'buyer_father' => 'required',
            'buyer_cnic' => 'required',
            'buyer_phone' => 'required',
            'buyer_address' => 'required',
        ]);
        $existingChassis = ModelsInvoice::pluck('chassis')->toArray();
        if (in_array($this->chassis, $existingChassis)) {
            $this->addError('chassis', 'Chassis already exists.');
            return;
        }
        $inovice = ModelsInvoice::create([
            'date' => $this->date,
            'sale_id' => $this->id,
            'title' => $this->title,
            'maker' => $this->maker,
            'engine' => $this->engine,
            'chassis' => $this->chassis,
            'model' => $this->model,
            'color' => $this->color,
            'horse_power' => $this->horse_power,
            'buyer_name' => $this->buyer_name,
            'buyer_father' => $this->buyer_father,
            'buyer_cnic' => $this->buyer_cnic,
            'buyer_phone' => $this->buyer_phone,
            'buyer_address' => $this->buyer_address,
            'status' => $this->status,
        ]);
        return redirect()->route('invoices.index');
    }
}
