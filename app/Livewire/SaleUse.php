<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use App\Models\Customer;
use App\Models\SaleDetail;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;

class SaleUse extends Component
{
    public $purchases, $vehicles, $pre_refrence;
    public $vehicle_type, $purchase_id, $title, $vehicle_id, $engine, $chassis, $model, $color, $horse_power, $tc_no, $register_no;
    public $owner_cnic, $owner_name, $owner_father, $owner_address;
    public $cnic, $phone, $customer_name, $father_name, $address;
    public $guarantor_name, $guarantor_father;
    public $total, $date, $time, $installment, $months, $down_payment_amount;

    public function mount()
    {
        $this->vehicles = VehicleType::pluck('vehicle_type', 'id');
        $this->date = \Carbon\Carbon::now()->format('Y-m-d');
        $this->time = \Carbon\Carbon::now()->format('H:i');
        $this->purchases = collect();
    }

    public function render()
    {
        return view('livewire.sale-use');
    }

    public function updatedVehicleId($id)
    {
        $this->purchases = PurchaseDetail::where(['vehicle_id' => $id, 'type' => 'Used'])->get()->pluck('FullTitle', 'id');
        $this->vehicle_type = VehicleType::find($id);
    }

    public function updatedPurchaseId($id)
    {
        $purchase = PurchaseDetail::where('id', $id)->orderBy('id', 'DESC')->first();
        $this->engine = $purchase->engine ?? '';
        $this->title = $purchase->title ?? '';
        $this->chassis = $purchase->chassis ?? '';
        $this->model = $purchase->model ?? '';
        $this->color = $purchase->color ?? '';
        $this->horse_power = $purchase->horse_power ?? '';
        $this->tc_no = $purchase->tc_no ?? '';
        $this->register_no = $purchase->register_no ?? '';

        $this->owner_cnic = $purchase->owner_cnic ?? '';
        $this->owner_name = $purchase->owner_name ?? '';
        $this->owner_father = $purchase->owner_father ?? '';
        $this->owner_address = $purchase->owner_address ?? '';

        $this->pre_refrence = $purchase->name ?? '';
    }

    public function updatedCnic()
    {
        $customer = Customer::where('cnic', $this->cnic)->first();
        $this->phone = $customer->phone ?? '';
        $this->customer_name = $customer->customer_name ?? '';
        $this->father_name = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
        $this->address = $customer->address ?? '';
    }

    function submit()
    {
        $this->validate([
            'vehicle_type' => 'required',
            'purchase_id' => 'required',
            'title' => 'required',
            'vehicle_id' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'owner_cnic' => 'required',
            'owner_name' => 'required',
            'owner_father' => 'required',
            'owner_address' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'customer_name' => 'required',
            'father_name' => 'required',
            'address' => 'required',
            'guarantor_name' => 'required',
            'guarantor_father' => 'required',
            'total' => 'required',
            'date' => 'required',
            'time' => 'required',
            'installment' => 'required|in:Yes,No',
            'months' => 'required_if:installment,Yes',
            'down_payment_amount' => 'required_if:installment,Yes',
        ]);

        DB::beginTransaction();

        $customer = Customer::updateOrInsert([
            'cnic' => $this->cnic,
            'phone' => $this->phone,
            'customer_name' => $this->customer_name,
            'father_name' => $this->father_name,
            'address' => $this->address,
        ]);
        $customer = Customer::where('cnic', $this->cnic)->first();

        $status = 4;
        if ($this->down_payment_amount < $this->total) {
            $status = 5;
        } elseif ($this->total == $this->down_payment_amount) {
            $status = 6;
        }
        $sale = Sale::create([
            'date' => $this->date,
            'time' => $this->time,
            'type' => 'Used',
            'customer_id' => $customer->id,
            'amount' => $this->total,
            'installment' => $this->installment,
            'months' => $this->months,
            'down_payment_amount' => $this->down_payment_amount,
            'status' => $status,
        ]);

        if ($this->installment == 'Yes') {
            $sale->payments()->create([
                'date' => $this->date,
                'type' => 'Cash',
                'total' => $this->total,
                'pending' => $this->total - $this->down_payment_amount,
                'received' => $this->down_payment_amount,
                'description' => 'Down Payment',
                'status' => 6,
            ]);
        }

        for ($i = 0; $i < $this->months; $i++) {
            $currentMonth = \Carbon\Carbon::now()->addMonths($i)->format('Y-m-d');
            $sale->installments()->create([
                'date' => $currentMonth,
                'amount' => ($this->total - $this->down_payment_amount) / $this->months,
                'due_amount' => ($this->total - $this->down_payment_amount) / $this->months,
                'description' => 'Sale used bike'
            ]);
        }

        $details = new SaleDetail;
        $details->sale_id = $sale->id;
        $details->tc_no = $this->tc_no;
        $details->register_no = $this->register_no;
        $details->purchase_id = $this->purchase_id;
        $details->type = 'Used';
        $details->title = $this->title;
        $details->engine = $this->engine;
        $details->chassis = $this->chassis;
        $details->model = $this->model;
        $details->color = $this->color;
        $details->horse_power = $this->horse_power;
        $details->sale_price = $this->total;
        $details->sale_tax = 0;
        $details->total = $this->total;
        $details->guarantor_name = $this->guarantor_name;
        $details->guarantor_father = $this->guarantor_father;
        $details->owner_name = $this->owner_name;
        $details->pre_refrence = $this->pre_refrence;
        $details->save();

        PurchaseDetail::where(['id' => $this->purchase_id, 'chassis' => $this->chassis])->update(['status' => 3]);

        DB::commit();
        return redirect()->route('sale-use.show', $sale->id);
    }
}
