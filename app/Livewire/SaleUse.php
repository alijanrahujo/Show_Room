<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;

class SaleUse extends Component
{
    public $purchases, $eng, $vehicles;
    public $purchase_id, $title, $vehicle_id, $engine, $power, $chassis, $model, $color, $purchase_amount, $sale, $date, $time, $tcno, $register, $vehicle;
    public function render()
    {
        $this->vehicles = PurchaseDetail::where(['type' => 'Use'])->with('vehicle')->get()->pluck('vehicle.vehicle_type', 'id');
        return view('livewire.sale-use');
    }

    public function updatedVehicle($id)
    {
        $purchases = PurchaseDetail::where(['id' => $id])->first();
        // $this->title = $purchases->with('vehicle')->get()->vehicle_type ?? '';
        $this->power = $purchases->vehicle->horse_power ?? '';
        $this->chassis = $purchases->chassis ?? '';
        $this->model = $purchases->model ?? '';
        $this->color = $purchases->color ?? '';
    }
}
