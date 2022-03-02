<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\StampInterface;
use Illuminate\Database\Eloquent\Model;
use App\Http\Interfaces\CouponInterface;
use App\Http\Controllers\StampController;

class DeleteCampaign extends Component
{
    public $url;
    public $slug;
    public $confirmingCampaignDeletion = false;

    public function confirmCampaignDeletion()
    {
        $this->dispatchBrowserEvent('confirming-delete-campaign');

        $this->confirmingCampaignDeletion = true;
    }

    public function cancelCampaignDeletation()
    {
        
        $this->confirmingCampaignDeletion = false;

        return redirect('/' . $this->url );
    } 

    public function deleteCampaign(Request $request, StampInterface $stampInterface, CouponInterface $couponInterface, PointInterface $pointInterface)
    {
        if(Gate::allows('admin_only', auth()->user())){

            if ($this->url == 'stamps')
            { 
                $stampInterface->deleteStamp($this->slug);
            }
            if ($this->url == 'points')
            { 
                $pointInterface->deletePoint($this->slug);
            }
            if ($this->url == 'coupons')
            { 
                $couponInterface->deleteCoupon($this->slug);
            }

            $request->session()->flash('flash.banner', 'Campaign has been deleted succesfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/' . $this->url);

        } else {
        
            $request->session()->flash('flash.banner', 'Only Admin is allowed !');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/' . $this->url);
        }
    }

    public function render()
    {
        return view('livewire.delete-campaign');
    }
}
