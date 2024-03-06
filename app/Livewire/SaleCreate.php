<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\SaleDetail;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;

class SaleCreate extends Component
{
    public $customers;
    public $purchases;
    public $vehicles;
    public $vehicle_type;

    public $purchase;
    public $purchased;

    public $cnic, $phone, $customer, $father, $address;

    public $purchase_id, $vehicle_id, $engine, $chassis, $model, $color, $purchase_amount, $sale, $date, $total, $registration, $tax, $sale_price, $sale_tax, $reg_fee, $fitting, $fitting_price;

    public $grand_total, $installment, $months;

    public $instaDate, $instaAmount, $instaDesc;

    public function mount()
    {
        $this->customers = Customer::pluck('customer_name', 'id');
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->purchase = 0;
        $this->purchases = collect();
        $this->purchased = collect();
        $this->date = date('Y-m-d');
        $this->registration = 'No';
        $this->fitting = 'No';
        $this->tax = 'No';

        $this->instaDate = [];
        $this->instaAmount = [];
        $this->instaDesc = [];
    }

    public function updated()
    {
        $this->updateTotal();
        $this->grandTotal();
    }

    public function render()
    {
        return view('livewire.sale-create');
    }

    public function updatecnic()
    {
        $customer = Customer::where('cnic', $this->cnic)->first();
        $this->phone = $customer->phone ?? '';
        $this->customer = $customer->customer_name ?? '';
        $this->father = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
    }

    public function updatephone()
    {
        $customer = Customer::where('phone', $this->phone)->first();
        if (!$this->customer) {
            $this->cnic = $customer->cnic ?? '';
            $this->customer = $customer->customer_name ?? '';
            $this->father = $customer->father_name ?? '';
            $this->address = $customer->address ?? '';
        }
    }

    public function updatedVehicleId($id)
    {
        $this->purchases = PurchaseDetail::where(['vehicle_id' => $id, 'type' => 'New', 'status' => 2])->get()->pluck('FullTitle', 'id');
        $this->vehicle_type = VehicleType::find($id);
        $this->updateTotal();
    }

    public function updateTotal()
    {
        if ($this->vehicle_type) {
            if (!$this->sale_price && $this->vehicle_type) {
                $this->sale_price = $this->vehicle_type->sale_price ?? 0;
            }
            $this->sale_tax = ($this->tax == 'Yes') ? $this->vehicle_type->sale_tax : 0;
            $this->reg_fee = ($this->registration == 'Yes') ? $this->vehicle_type->reg_fee : 0;
            $this->total = ($this->sale_tax) ? $this->sale_price + ($this->sale_price / 100 * $this->sale_tax) : $this->sale_price;
            $this->total += ($this->fitting == 'Yes') ? $this->fitting_price : 0;
            $this->total += ($this->registration == 'Yes') ? $this->reg_fee : 0;
        } else {
            $this->reset(['sale_price', 'sale_tax', 'reg_fee', 'total', 'fitting_price', 'reg_fee']);
        }
    }

    public function addrecord()
    {
        $this->validate([
            'vehicle_id' => 'required',
            'purchase_id' => 'required',
            'tax' => 'required',
            'registration' => 'required',
            'sale_price' => 'required',
            'sale_tax' => 'required',
            'reg_fee' => 'required',
            'total' => 'required',
        ]);

        $purchase = PurchaseDetail::where(['id' => $this->purchase_id])->first();
        // dd($this->sale);
        $this->purchased[] = [
            'vehicle_id' => $this->vehicle_id,
            'purchase_id' => $this->purchase_id,
            'tax' => $this->tax,
            'registration' => $this->registration,
            'sale_price' => $this->sale_price,
            'sale_tax' => $this->sale_tax,
            'reg_fee' => $this->reg_fee,
            'fitting_price' => $this->fitting_price,
            'total' => $this->total,
            'vehicle' => $purchase->vehicle->vehicle_type,
            'engine' => $purchase->engine,
            'chassis' => $purchase->chassis,
            'model' => $purchase->model,
            'color' => $purchase->color,
        ];
        $this->purchase_id = null;
        $this->grandTotal();
    }

    public function delete($id)
    {
        unset($this->purchased[$id]);
        $this->grandTotal();
    }

    function grandTotal()
    {
        $this->grand_total = 0;
        foreach ($this->purchased as $item) {
            $amount = is_array($item) ? ($item['total'] ?? 0) : ($item->total ?? 0);
            $this->grand_total += $amount;
        }
    }

    function submit()
    {
        // dd($this->instaDesc);
        $this->validate([
            'cnic' => 'required',
            'phone' => 'required',
            'customer' => 'required',
            'father' => 'required',
            'address' => 'required',
            'date' => 'required',
            'purchased' => 'array|min:1',
            'grand_total' => 'required',
            'installment' => 'required|in:Yes,No',
            'months' => 'required_if:installment,Yes',
            'fitting' => 'required|in:Yes,No',
            'fitting_price' => 'required_if:fitting_price,Yes',

        ]);

        DB::beginTransaction();

        $customer = Customer::updateOrInsert([
            'cnic' => $this->cnic,
            'phone' => $this->phone,
            'customer_name' => $this->customer,
            'father_name' => $this->father,
            'address' => $this->address,
        ]);

        $customer = Customer::where('cnic', $this->cnic)->first();

        $sale = Sale::create([
            'date' => $this->date,
            'type' => 'New',
            'customer_id' => $customer->id,
            'amount' => $this->grand_total,
            'installment' => $this->installment,
            'months' => $this->months,
            'status' => 4,
        ]);

        for ($i = 0; $i < $this->months; $i++) {
            $currentMonth = \Carbon\Carbon::now()->addMonths($i)->format('Y-m-d');
            $sale->installments()->create([
                'date' => $currentMonth,
                'amount' => $this->grand_total / $this->months,
                'description' => 'Sale new bike'
            ]);
        }

        foreach ($this->purchased as $val) {

            $details = new SaleDetail;
            $details->purchase_id = $val['purchase_id'];
            $details->sale_id = $sale->id;
            $details->type = 'New';
            $details->title = $val['vehicle'];
            $details->chassis = $val['chassis'];
            $details->engine = $val['engine'];
            $details->model = $val['model'];
            $details->color = $val['color'];
            $details->sale_price = $val['sale_price'];
            $details->sale_tax = $val['sale_tax'];
            $details->reg_fee = $val['reg_fee'];
            $details->fitting_price = $val['fitting_price'];
            $details->total = $val['total'];
            $details->save();

            PurchaseDetail::where(['purchase_id' => $val['purchase_id'], 'chassis' => $val['chassis']])->update(['status' => 3]);
        }
        DB::commit();
        return redirect()->route('sales.show', $sale->id);
    }
}
