<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Sale;
use Livewire\Component;
use App\Models\Customer;
use App\Models\SaleDetail;
use App\Models\VehicleType;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration as regModal;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;
    public $vehicles, $vehicle_id, $chassis, $title, $type, $status, $engine, $model, $color, $horse_power, $date, $name, $father_name, $phone, $cnic, $address, $ref_name, $refrence, $ref_father, $ref_phone, $ref_address, $payment, $description, $reg_fee;
    public $file;

    public function render()
    {
        $this->vehicles = VehicleType::where('status', 1)->pluck('vehicle_type', 'id');
        $this->date = Carbon::now()->format('Y-m-d');
        return view('livewire.registration');
    }

    function updatedChassis()
    {
        $detail = regModal::where('chassis', $this->chassis)->orderby('id', 'desc')->first();

        $this->type = $detail->type ?? '';
        $this->date = $detail->date ?? '';
        $this->title = $detail->title ?? '';
        $this->engine = $detail->engine ?? '';
        $this->model = $detail->model ?? '';
        $this->color = $detail->color ?? '';
        $this->horse_power = $detail->horse_power ?? '';
        $this->vehicle_id = $detail->vehicle_id ?? '';
        $this->name = $detail->name ?? '';
        $this->father_name = $detail->father_name ?? '';
        $this->cnic = $detail->cnic ?? '';
        $this->phone = $detail->phone ?? '';
        $this->address = $detail->address ?? '';
        $this->ref_name = $detail->ref_name ?? '';
        $this->ref_father = $detail->ref_father ?? '';
        $this->refrence = $detail->ref_cnic ?? '';
        $this->ref_phone = $detail->ref_phone ?? '';
        $this->ref_address = $detail->ref_address ?? '';
        $this->description = $detail->description ?? '';
        $this->payment = $detail->payment ?? '';
        $this->status = $detail->status ?? '';

        if (!$detail) {
            // dd("ok");
            $detail = SaleDetail::where('chassis', $this->chassis)->with('sale.customer')->orderby('id', 'desc')->first();
            $this->title = $detail->title ?? '';
            $this->vehicle_id = $detail->vehicle_id ?? '';
            $this->horse_power = $detail->horse_power ?? '';
            $this->engine = $detail->engine ?? '';
            $this->model = $detail->model ?? '';
            $this->color = $detail->color ?? '';
            $this->name = $detail->sale->customer->customer_name ?? '';
            $this->father_name = $detail->sale->customer->father_name ?? '';
            $this->cnic = $detail->sale->customer->cnic ?? '';
            $this->phone = $detail->sale->customer->phone ?? '';
            $this->address = $detail->sale->customer->address ?? '';
            $this->reg_fee = $detail->reg_fee ?? '';
        }
    }
    public function updatedVehicleId($id)
    {
        $vehicle = VehicleType::where('id', $id)->first();
        $this->title = $vehicle->vehicle_type ?? '';
    }
    public function updatedCnic()
    {
        $customer = Customer::where('cnic', $this->cnic)->first();
        $this->phone = $customer->phone ?? '';
        $this->name = $customer->customer_name ?? '';
        $this->father_name = $customer->father_name ?? '';
        $this->address = $customer->address ?? '';
    }

    function updatedRefrence()
    {
        $customer = Customer::where('cnic', $this->refrence)->first();
        $this->ref_phone = $customer->phone ?? '';
        $this->ref_name = $customer->customer_name ?? '';
        $this->ref_father = $customer->father_name ?? '';
        $this->ref_address = $customer->address ?? '';
    }

    function updatedType()
    {
        // dd("working");
        $this->status = '10';
        $this->payment = ($this->type == 'Registration') ? $this->reg_fee : 0;
    }

    function submit()
    {
        $this->validate([
            'date' => 'required',
            'vehicle_id' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'horse_power' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'status' => 'required',
            'description' => 'required',
            'payment' => 'required',
            'status' => 'required',
        ]);

        $existingChassis = regModal::where(['type' => $this->type, 'status' => $this->status])->pluck('chassis')->toArray();
        if (in_array($this->chassis, $existingChassis)) {
            $this->addError('type', 'Type already exists.');
            $this->addError('status', 'Status already exists.');
            $this->addError('chassis', 'Chassis already exists.');
            return;
        }

        $file_name = '';
        if($this->file)
        {
            $file_name = $this->file->store('public/uploads/files/registration');
        }

        DB::beginTransaction();

        $registration = regModal::create([
            'type' => $this->type,
            'date' => $this->date,
            'title' => $this->title,
            'engine' => $this->engine,
            'chassis' => $this->chassis,
            'model' => $this->model,
            'color' => $this->color,
            'horse_power' => $this->horse_power,
            'vehicle_id' => $this->vehicle_id,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'cnic' => $this->cnic,
            'phone' => $this->phone,
            'address' => $this->address,
            'ref_name' => $this->ref_name,
            'ref_father' => $this->ref_father,
            'ref_cnic' => $this->refrence,
            'ref_phone' => $this->ref_phone,
            'ref_address' => $this->ref_address,
            'description' => $this->description,
            'payment' => $this->payment,
            'image' => null,
            'file' => str_replace('public/', '', $file_name),
            'status' => $this->status
        ]);

        DB::commit();
        return redirect()->route('registration.show', $registration->id);
    }
}
