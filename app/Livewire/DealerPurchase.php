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
    public $vehicle_id, $title, $chassis, $engine, $model, $color, $horse_power, $purchase_amount, $purchase_tax, $do_number, $do_date;
    public $data, $total_amount, $excluding_tax, $rate_tax, $paybel_tax, $including_tax;

    public $date, $dealer_id, $total;

    public $edit_data = false;
    public $edit_id = null;
    public $edit_form_id;

    function mount($id = null)
    {
        $this->edit_form_id = $id;
        $this->total_amount = 0;
        $this->date = Carbon::now()->format('Y-m-d');
        $this->do_date = Carbon::now()->format('Y-m-d');
        $this->dealers = Dealer::all()->pluck('full_company', 'id');
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->data = collect();

        if ($id) {
            $purchase = Purchase::find($id);
            $this->total_amount = $purchase['total_amount'];
            $this->data = $purchase->purchaseDetail->toArray();
            $this->dealer_id = $purchase->purchaseable->id;
            $this->amount_update();
        }
    }

    public function render()
    {
        return view('livewire.dealer-purchase');
    }

    public function updatedVehicleId($id)
    {
        $vehicle_type = VehicleType::find($id);
        $this->horse_power = $vehicle_type->horse_power ?? '';
        $this->purchase_amount = $vehicle_type->purchase_price ?? '';
        $this->purchase_tax = $vehicle_type->purchase_tax ?? '';
        $this->title = $vehicle_type->vehicle_type ?? '';
    }

    function addvehicle()
    {
        $this->validate([
            'vehicle_id' => 'required',
            'chassis' => 'required|unique:purchase_details',
            'engine' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'purchase_amount' => 'required',
            'purchase_tax' => 'required',
            // 'do_number' => 'required',
            'do_date' => 'required',
        ]);

        $vehicle = VehicleType::find($this->vehicle_id);

        if ($this->edit_data) {
            $this->data[$this->edit_id] = [
                'vehicle_id' => $this->vehicle_id,
                'title' => $this->title,
                'vehicle' => $vehicle,
                'chassis' => $this->chassis,
                'engine' => $this->engine,
                'model' => $this->model,
                'color' => $this->color,
                'horse_power' => $this->horse_power,
                'purchase_amount' => $this->purchase_amount,
                'purchase_tax' => $this->purchase_tax,
                'total' => $this->purchase_amount + ($this->purchase_amount / 100 * $this->purchase_tax),
                'do_number' => $this->do_number,
                'do_date' => $this->do_date,
            ];
        } else {

            $existingChassis = collect($this->data)->pluck('chassis')->toArray();
            if (in_array($this->chassis, $existingChassis)) {
                $this->addError('chassis', 'Chassis already exists.');
                return;
            }

            $this->data[] = [
                'vehicle_id' => $this->vehicle_id,
                'title' => $this->title,
                'vehicle' => $vehicle,
                'chassis' => $this->chassis,
                'engine' => $this->engine,
                'model' => $this->model,
                'color' => $this->color,
                'horse_power' => $this->horse_power,
                'purchase_amount' => $this->purchase_amount,
                'purchase_tax' => $this->purchase_tax,
                'total' => $this->purchase_amount + ($this->purchase_amount / 100 * $this->purchase_tax),
                'do_number' => $this->do_number,
                'do_date' => $this->do_date,
            ];
        }

        $this->amount_update();

        $this->edit_data = false;
        $this->edit_id = null;

        // $this->reset(['vehicle_xid', 'title', 'chassis', 'engine', 'model', 'color', 'amount', 'tax']);
    }


    function amount_update()
    {
        $this->total_amount = 0;
        $this->excluding_tax = 0;
        $this->rate_tax = 0;
        $this->paybel_tax = 0;
        $this->including_tax = 0;
        foreach ($this->data as $item) {
            $this->total_amount += is_array($item) ? ($item['total'] ?? 0) : ($item->total ?? 0);
            $this->excluding_tax += is_array($item) ? ($item['purchase_amount'] ?? 0) : ($item->purchase_amount ?? 0);
            $this->rate_tax += is_array($item) ? ($item['purchase_tax'] ?? 0) : ($item->purchase_tax ?? 0);
            $this->including_tax += is_array($item) ? ($item['total'] ?? 0) : ($item->total ?? 0);
        }
        $this->rate_tax = $this->rate_tax / count($this->data);
        $this->paybel_tax = $this->total_amount / 100 * $this->rate_tax;
    }

    function submit()
    {
        $this->validate([
            'dealer_id' => 'required',
            'date' => 'required',
            'total_amount' => 'required',
            'data' => 'required|array|min:1'
        ]);

        $dealer = Dealer::find($this->dealer_id);

        if (!$this->edit_form_id) {
            //Store New Data
            $purchase = $dealer->purchaseable()->create([
                'date' => $this->date,
                'total_amount' => $this->total_amount,
                'excluding_tax' => $this->excluding_tax,
                'rate_tax' => $this->rate_tax,
                'paybel_tax' => $this->paybel_tax,
                'including_tax' => $this->including_tax,
                'status' => 2,
                'type' => 'New',
            ]);

            $purchase->payments()->create([
                'date' => $this->date,
                'type' => 'Cash',
                'total' => $this->total_amount,
                'received' => $this->total_amount,
                'pending' => 0,
                'status' => 6,
            ]);

            foreach ($this->data as $val) {
                $details = new PurchaseDetail;
                $details->type = 'New';
                $details->vehicle_id = $val['vehicle_id'];
                $details->purchase_id = $purchase->id;
                $details->title = $val['title'];
                $details->chassis = $val['chassis'];
                $details->engine = $val['engine'];
                $details->model = $val['model'];
                $details->color = $val['color'];
                $details->horse_power = $val['horse_power'];
                $details->purchase_amount = $val['purchase_amount'];
                $details->purchase_tax = $val['purchase_tax'];
                $details->total = $val['total'];
                $details->do_number = $val['do_number'];
                $details->do_date = $val['do_date'];
                $details->status = 2;
                $details->save();
            }
        } else {
            //Update Data
            $purchase = Purchase::find($this->edit_form_id);
            $purchase->update([
                'date' => $this->date,
                'total_amount' => $this->total_amount,
                'excluding_tax' => $this->excluding_tax,
                'rate_tax' => $this->rate_tax,
                'paybel_tax' => $this->paybel_tax,
                'including_tax' => $this->including_tax,
                'type' => 'New',
            ]);
            $purchase->payments()->delete();
            $purchase->payments()->create([
                'date' => $this->date,
                'type' => 'Cash',
                'total' => $this->total_amount,
                'received' => $this->total_amount,
                'pending' => 0,
                'status' => 6,
            ]);

            $purchase->purchaseDetail()->delete();
            $purchaseDetailsData = [];
            foreach ($this->data as $val) {
                $purchaseDetailsData[] = [
                    'vehicle_id' => $val['vehicle_id'],
                    'type' => 'New',
                    'title' => $val['title'],
                    'chassis' => $val['chassis'],
                    'engine' => $val['engine'],
                    'model' => $val['model'],
                    'color' => $val['color'],
                    'horse_power' => $val['horse_power'],
                    'purchase_amount' => $val['purchase_amount'],
                    'purchase_tax' => $val['purchase_tax'],
                    'total' => $val['total'],
                    'do_number' => $val['do_number'],
                    'do_date' => $val['do_date'],
                    'status' => 2,
                ];
            }

            $purchase->purchaseDetail()->createMany($purchaseDetailsData);
        }
        return redirect()->route('dealer-purchase.show', $purchase->id);
    }

    function edit($id)
    {
        $this->vehicle_id = $this->data[$id]['vehicle_id'];
        $this->title = $this->data[$id]['title'];
        $this->chassis = $this->data[$id]['chassis'];
        $this->engine = $this->data[$id]['engine'];
        $this->model = $this->data[$id]['model'];
        $this->color = $this->data[$id]['color'];
        $this->horse_power = $this->data[$id]['horse_power'];
        $this->purchase_amount = $this->data[$id]['purchase_amount'];
        $this->purchase_tax = $this->data[$id]['purchase_tax'];
        $this->total = $this->data[$id]['total'];
        $this->do_number = $this->data[$id]['do_number'];
        $this->do_date = $this->data[$id]['do_date'];

        $this->edit_data = true;
        $this->edit_id = $id;
    }

    function delete($id)
    {
        unset($this->data[$id]);
        $this->amount_update();
    }
}
