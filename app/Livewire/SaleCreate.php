<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Purchase;

class SaleCreate extends Component
{
    public $customers;
    public $purchases;

    public $purchase;
    public $purchased;

    public $title, $engine, $chassis, $model, $color, $purchase_amount;

    public function mount()
    {
        $this->customers = Customer::pluck('customer_name', 'id');
        $this->purchases = Purchase::pluck('title', 'id');
        $this->purchase = 0;
        $this->purchased = collect();
    }
    public function render()
    {
        return view('livewire.sale-create');
    }

    public function updatedPurchase($id)
    {
        $purchased = Purchase::find($id);
        $this->title = $purchased->title ?? '';
        $this->engine = $purchased->engine ?? '';
        $this->chassis = $purchased->chassis ?? '';
        $this->model = $purchased->model ?? '';
        $this->color = $purchased->color ?? '';
        $this->purchase_amount = $purchased->payments->sum('total') ?? '';
    }
}
