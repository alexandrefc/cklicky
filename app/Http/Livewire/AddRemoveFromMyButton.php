<?php

namespace App\Http\Livewire;

use App\Models\MyPoint;
use App\Models\MyStamp;
use App\Models\MyVenue;
use Livewire\Component;
use App\Models\MyCoupon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class AddRemoveFromMyButton extends Component
{
    public $model;
    public bool $active;
    public $myCampaign;
    public $campaign;
    

    public function mount(MyStamp $myStamp, MyPoint $myPoint, MyCoupon $myCoupon, MyVenue $myVenue)
    {
        
        
        if ($this->model == 'stamp')
        {
            $this->myCampaign = $myStamp;
        }
        if ($this->model == 'point')
        {
            $this->myCampaign = $myPoint;
        }
        if ($this->model == 'coupon')
        {
            $this->myCampaign = $myCoupon;
        }
        if ($this->model == 'venue')
        {
            $this->myCampaign = $myVenue;
        }

        if (auth()->check())
        {
            if (!($this->myCampaign->checkIfMyExists($this->campaign->id, auth()->user()->id)))
            {
                return $this->active = FALSE;
            
            } elseif (!($this->myCampaign->checkIfMyIsActive($this->campaign->id, auth()->user()->id))) {
                
                return $this->active = FALSE;
                
            } else {
                return $this->active = TRUE;
            }
        } else {
            return $this->active = FALSE;
        }
        
    }

    public function addToMy()
    {
        if (!($this->myCampaign->checkIfMyExists($this->campaign->id, auth()->user()->id)))
        {
            $this->myCampaign->addToMy($this->campaign->id, auth()->user()->id);
        }

        $this->myCampaign->activateMy($this->campaign->id);

    }

    public function removeFromMy()
    {
        $this->myCampaign->deactivateMy($this->campaign->id);
    }

    public function render()
    {
        return view('livewire.add-remove-from-my-button');
    }
}
