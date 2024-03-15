<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\VehicleType;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::orderBy('id', 'DESC')->latest()->get();
        return view("registrations.index", compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registrations.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'date' => 'required',
            'issue_date' => 'required',
            'title' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'payment' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $register = Registration::find($id);

        if ($register->image == null) {
            return view('registrations.show_with_out_image', compact('register'));
        }

        return view("registrations.show", compact("register"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $register = Registration::find($id);
        $vehicles = VehicleType::where('status', 1)->pluck('vehicle_type', 'id');
        return view("registrations.edit", compact("register", 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'chassis' => 'required',
            'engine' => 'required',
            'model' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'issue_date' => 'required',
            'payment' => 'required',
        ]);
        // return $request;
        $register = Registration::find($id)->update([
            'date' => $request->date,
            'issue_date' => $request->issue_date,
            'title' => $request->title,
            'engine' => $request->engine,
            'chassis' => $request->chassis,
            'model' => $request->model,
            'color' => $request->color,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'cnic' => $request->cnic,
            'phone' => $request->phone,
            'address' => $request->address,
            'ref_name' => $request->ref_name,
            'ref_father' => $request->ref_father,
            'ref_cnic' => $request->refrence,
            'ref_phone' => $request->ref_phone,
            'ref_address' => $request->ref_address,
            'payment' => $request->payment,
        ]);

        return redirect()->route('registration.index')->with('success', 'Registration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $register = Registration::find($id)->delete();
        return redirect()->route('registration.index')->with('success', 'Registration deleted successfully');
    }

    public function imageUpdate(Request $request, $id)
    {
        // return $request;
        $this->validate($request, [
            'status' => 'required',
            'payment' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        DB::beginTransaction();

        $img = $request->image;
        $folderPath = "public/uploads/registrations/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        $registrations = Registration::find($id);

        $registrations->update([
            'status' => $request->status,
            'payment' => $request->payment,
            'date' => $request->date,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
        ]);
        $registrations->payments()->create([
            'date' => $request->date,
            'type' => $request->cash,
            'total' => $request->payment,
            'received' => $request->paid,
            'pending' => $request->payment - $request->paid,
            'description' => $request->description,
            'status' => $request->status,
            'image' => str_replace('public/', '', $file),
        ]);
        DB::commit();

        return redirect()->back()->with('success', 'Registration created successfully');
    }
}
