<?php

namespace App\Livewire;

use App\Models\Dealer;
use App\Models\VehicleType;
use Livewire\Component;

class DealerPurchase extends Component
{
    public $dealers;
    public $vehicles;
    public $dealer_id, $vehicle_id, $title, $chassis, $engine, $model, $color, $status;
    public $data;

    function mount()
    {
        $this->dealers = Dealer::pluck('dealer_name', 'id');
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->status = 1;
        $this->data = collect();
    }

    public function render()
    {
        return view('livewire.dealer-purchase');
    }

    function addrow()
    {
        $this->data[] = [
            'vehicle_id' => $this->vehicle_id,
            'title' => $this->title,
            'chassis' => $this->chassis,
            'engine' => $this->engine,
            'model' => $this->model,
            'color' => $this->color,
            'status' => $this->status,
        ];
        // dd($this->data);
        $this->vehicle_id = '';
        $this->title = '';
        $this->chassis = '';
        $this->engine = '';
        $this->model = '';
        $this->color = '';
        $this->status = '';
    }
}
