<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Dealer;
use Livewire\Component;
use App\Models\Purchase;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;

class DealerPurchase extends Component
{
    public $dealers;
    public $vehicles;
    public $vehicle_id, $title, $chassis, $engine, $model, $color, $amount, $tax, $total_amount;
    public $data;

    public $date, $dealer_id, $total, $paid;

    function mount()
    {
        $this->total_amount = 0;
        $this->date = Carbon::now()->format('Y-m-d');
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
            'amount' => 'required',
            'tax' => 'required',
        ]);

        $this->data[] = [
            'vehicle_id' => $this->vehicle_id,
            'title' => $this->title,
            'chassis' => $this->chassis,
            'engine' => $this->engine,
            'model' => $this->model,
            'color' => $this->color,
            'amount' => $this->amount,
            'tax' => $this->tax,
        ];
        $this->total_amount += $this->amount;

        // $this->reset(['vehicle_xid', 'title', 'chassis', 'engine', 'model', 'color', 'amount', 'tax']);
    }

    function submit()
    {
        $this->validate([
            'dealer_id' => 'required',
            'date' => 'required',
            'total_amount' => 'required',
            'paid' => 'required',
            'data' => 'required|array|min:1'
        ]);

        $dealer = Dealer::find($this->dealer_id);
        $purchase = $dealer->purchaseable()->create([
            'date' => $this->date,
            'total_amount' => $this->total_amount
        ]);

        $purchase->payments()->create([
            'date' => $this->date,
            'total' => $this->total_amount,
            'recived' => $this->paid,

        ]);
        foreach ($this->data as $val) {
            $details = new PurchaseDetail;
            $details->type = 'yes';
            $details->vehicle_id = $val['vehicle_id'];
            $details->purchase_id = $purchase->id;
            $details->title = $val['title'];
            $details->chassis = $val['chassis'];
            $details->engine = $val['engine'];
            $details->model = $val['model'];
            $details->color = $val['color'];
            $details->purchase_amount = $val['amount'];
            $details->save();
        }
        return redirect('dealer-purchase');
    }
}
