<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ManageSubscriptionsForm extends Component
{
    public function render()
    {
        return view('livewire.manage-subscriptions-form');
    }

    public function redirectToStripe()
    {
        return redirect('/create-portal-session.php');
    }
}
