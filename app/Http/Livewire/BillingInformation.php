<?php

namespace App\Http\Livewire;

use App\Models\Billing;
use Livewire\Component;

class BillingInformation extends Component
{
    public $billing, $billings, $company_name, $country, $street, $city, $state, $post_code, $tax_id;
    public $updateBilling = false;

    protected $rules = [
        'company_name'=>'required|string|max:255',
        'country'=>'nullable|string|max:255', 
        'street'=>'nullable|string|max:255',
        'city'=>'nullable|string|max:255',
        'state'=>'nullable|string|max:255',
        'post_code'=>'nullable|string|max:255',
        'tax_id'=>'nullable|string|max:255',
        
    ];

    public function render()
    {
        $this->billing = Billing::where('user_email', auth()->user()->email)
            ->orWhere('user_id', auth()->user()->id)
            ->first();  
        $this->company_name = $this->billing->company;
        $this->tax_id = $this->billing->tax_id;
        $this->country = $this->billing->country;
        $this->city = $this->billing->city;
        $this->street = $this->billing->street;
        $this->state = $this->billing->state;
        $this->post_code = $this->billing->post_code;

        return view('livewire.billing-information');
    }

    public function createBillingInformation()
    {
        Billing::create([
            'company' => $this->company_name,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'state' => $this->state,
            'post_code' => $this->post_code,
            'state' => $this->state,
            'tax_id' => $this->tax_id,
            'user_id' => auth()->user()->id
        ]);

        
    }

    public function updateBillingInformation()
    {
        $this->validate();
        Billing::where('id', $this->billing->id)->update([
            'company' => $this->company_name,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'state' => $this->state,
            'post_code' => $this->post_code,
            'state' => $this->state,
            'tax_id' => $this->tax_id,
            'user_id' => auth()->user()->id
        ]);

        // $userBilling = Billing::where('id', $this->billing->id)->first();
        
        // $userBilling->forcefill([
        //     'company' => $this->company_name,
        //     'country' => $this->country,
        //     'city' => $this->city,
        //     'street' => $this->street,
        //     'state' => $this->state,
        //     'post_code' => $this->post_code,
        //     'state' => $this->state,
        //     'tax_id' => $this->tax_id,
        //     'user_id' => auth()->user()->id
        // ])->save();

        $this->emit('saved');
        // $this->emit('refresh-navigation-menu');
    }
}
