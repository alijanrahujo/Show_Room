<?php

namespace App\Livewire;

use App\Models\Dealer;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\VehicleType;
use Livewire\Component;

class DealerPurchase extends Component
{
    public $dealers;
    public $vehicles;
    public $vehicle_id, $title, $chassis, $engine, $model, $color;
    public $data;

    public $date, $dealer_id, $total, $paid;

    function mount()
    {
        $this->dealers = Dealer::pluck('dealer_name', 'id');
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->data = collect();
    }

    public function render()
    {
        return view('livewire.dealer-purchase');
    }

    function addvehicle()
    {
        $this->validate([
            'vehicle_id' => 'required',
            'title' => 'required',
            'chassis' => 'required',
            'engine' => 'required',
            'model' => 'required',
            'color' => 'required',
        ]);

        $this->data[] = [
            'vehicle_id' => $this->vehicle_id,
            'title' => $this->title,
            'chassis' => $this->chassis,
            'engine' => $this->engine,
            'model' => $this->model,
            'color' => $this->color,
        ];

        $this->reset(['vehicle_id', 'title', 'chassis', 'engine', 'model', 'color']);
    }

    function submit()
    {
        $this->validate([
            'dealer_id' => 'required',
            'date' => 'required',
            'total' => 'required',
            'paid' => 'required',
            'data' => 'required|array|min:1'
        ]);

        $dealer = Dealer::find($this->dealer_id);
        // dd($purchase);
        $purchase = $dealer->purchaseable()->create([
            'date' => $this->date,
            'total_amount' => $this->total
        ]);

        $purchase->payments()->create([
            'date' => $this->date,
            'total' => $this->total,
            'recived' => $this->paid,

        ]);

        foreach($this->data as $val)
        {
            $details = new PurchaseDetail;
            $details->vehicle_id = $val['vehicle_id'];
            $details->purchase_id = $purchase->purchase_id;
            $details->title = $val['title'];
            $details->chassis = $val['chassis'];
            $details->engine = $val['engine'];
            $details->model = $val['model'];
            $details->color = $val['color'];
            $details->save();
        }
        return redirect('dealer-purchase');
    }
}
