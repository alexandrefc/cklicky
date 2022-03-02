<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\MyCoupon;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use App\Services\CreateSlug;
use Illuminate\Http\Request;
use App\Services\UploadImage;
use App\Events\UserRegistered;
use App\Services\CreateQrcode;
use App\Mail\SendCouponCampaign;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Repositories\VenueRepository;
use App\Http\Requests\ValidateCreateCoupon;
use App\Http\Requests\ValidateUpdateCoupon;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $couponInterface;
    public function __construct(CouponInterface $couponInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        // $this->couponModel = new Coupon;
        $this->couponInterface = $couponInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $coupons = $this->couponInterface->getAllManagerCoupons();   
        $rewards = $this->couponInterface->getAllManagerCoupons();     
    
        return view('coupons.index', compact('coupons', 'rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueInterface $venueInterface, CategoryInterface $categoryInterface)
    {
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $coupons = $this->couponInterface->getAllCoupons();
        $categories = $categoryInterface->getAllCategories();
        
        if(Gate::allows('admin_only', auth()->user())){
            return view('coupons.create', compact('venues', 'categories', 'coupons'));
        } else {
            return redirect('/loyalty')->dangerBanner('Only Admin is allowed !');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCreateCoupon $request)
    {
        $this->couponInterface->createCoupon($request);

        $request->session()->flash('flash.banner', 'Coupon campaign has been created successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $coupon = $this->couponInterface->getCouponBySlug($slug);
        $reward = $this->couponInterface->getCouponById($coupon->reward_id);
        $isCouponRedeemed = '';
        $isMyCoupon = '';
        $myCoupon = new MyCoupon;
        
        if(auth()->check())
        {
            $userId = auth()->user()->id;
        
            if($myCoupon->checkIfMyExists($coupon->id, $userId))
            {
                $isMyCoupon = TRUE; 
                if($myCoupon->checkIfCouponIsRedeemed($coupon->id, $userId))
                {
                    $isCouponRedeemed = TRUE; 
                } else {
                    $isCouponRedeemed = FALSE;
                };
            } else {
                $isMyCoupon = FALSE;
                $isCouponRedeemed = FALSE;
            }
            

            $myCoupon = $myCoupon->getMyCouponById($coupon->id, auth()->user()->id);
            
            return view('coupons.show', compact('coupon', 'isMyCoupon', 'isCouponRedeemed', 'myCoupon', 'reward'));
        } else {
            return view('coupons.show', compact('coupon', 'reward')); 
        }

        // $userId = auth()->user()->id;
        
        // if($myCoupon->checkIfMyExists($coupon->id, $userId))
        // {
        //     $isMyCoupon = TRUE; 
        //     if($myCoupon->checkIfCouponIsRedeemed($coupon->id, $userId))
        //     {
        //         $isCouponRedeemed = TRUE; 
        //     } else {
        //         $isCouponRedeemed = FALSE;
        //     };
        // } else {
        //     $isMyCoupon = FALSE;
        //     $isCouponRedeemed = FALSE;
        // }
        
        // return view('coupons.show', compact('coupon', 'isMyCoupon', 'isCouponRedeemed')); 
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VenueInterface $venueInterface, CategoryInterface $categoryInterface, $slug)
    {
        $coupon = $this->couponInterface->getCouponbySlug($slug);
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $categories = $categoryInterface->getAllCategories();
        $coupons = $this->couponInterface->getAllCoupons();

        if(Gate::allows('manager_only', $coupon)){
            return view('coupons.edit', compact('coupon', 'venues', 'categories', 'coupons'));
        } else {
            return back()->dangerBanner('Only Admin is allowed !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdateCoupon $request, $slug)
    {
        $this->couponInterface->updateCoupon($request, $slug);

        $request->session()->flash('flash.banner', 'Coupon has been updated successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        if(Gate::allows('admin_only', auth()->user())){
            $this->couponInterface->deleteCoupon($slug);

            $request->session()->flash('flash.banner', 'Coupon has been deleted successfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/coupons');
        
        } else {
            return redirect('/loyalty')->dangerBanner('Only Admin is allowed !');
        }
    }

    public function addToMyCoupons($couponId)
    {
        $myCoupon = new MyCoupon;
        $userId = auth()->user()->id;

        if (!($myCoupon->checkIfMyExists($couponId, $userId)))
        {
            $myCoupon->addToMy($couponId, $userId);

            $myCoupon->activateMy($couponId, $userId);

            return back()->banner('Coupon has been added to favourites successfully !');
        
        } elseif (!($myCoupon->checkIfMyIsActive($couponId, $userId))) {
            
            $myCoupon->activateMy($couponId, $userId);

            return back()->banner('Coupon has been added to favourites successfully !');
            
        } else {

            return back()->dangerBanner('This Coupon has been already added to favourites !');
        }

    }

    public function deactivateMy($couponId)
    {
        $myCoupon = new MyCoupon;

        $myCoupon->deactivateMy($couponId);

        return back()->banner('Coupon campaign has been removed from favourites !');
    }

    public function removeFromMy($couponId)
    {
        $myCoupon = new MyCoupon;

        $myCoupon->removeFromMy($couponId);

        return back()->banner('Coupon campaign has been removed from favourites !');
    }


    public function confirmRedeem($couponId)
    {
        $myCoupon = new MyCoupon;
        $userId = auth()->user()->id;
        
        if (!($myCoupon->checkIfMyExists($couponId, $userId)))
        {
            $myCoupon->addToMy($couponId, $userId);
        }

        $coupon = $this->couponInterface->getCouponById($couponId);
        $redeemQrcodePath = (new MyCoupon())->getRedeemQrcodePath($coupon->id);
        $myCoupon = $myCoupon->getMyCouponById($couponId, $userId);
            
        return view('coupons.redeem', compact('coupon', 'redeemQrcodePath', 'myCoupon'));
    }

    public function redeem($couponId, $userId) 
    {
        $myCoupon = new MyCoupon;
        $coupon = $this->couponInterface->getCouponById($couponId);

        if($this->couponInterface->checkIfCampaignIsActive($couponId))
        {
            if($this->stampInterface->checkIfNowIsInValidTime($couponId))
            {
                if (($this->couponInterface->checkIfUserIsManager($couponId)))
                {
                    if (!($myCoupon->checkIfMyExists($couponId, $userId)))
                    {
                        $myCoupon->addToMy($couponId, $userId);
                        $myCoupon->redeemCoupon($couponId, $userId);
                        
                        if($myCoupon->checkIfRewardIsAvailable($couponId, $userId))
                        {
                            $this->couponInterface->addCouponRewardToMyCoupons($couponId, $userId);
                        }

                        return redirect('/coupons/' . $coupon->slug)->banner('Coupon has been redeemed successfully !');
                            
                    } else {
                        if (!($myCoupon->checkIfCouponIsRedeemed($couponId, $userId)))
                        {
                            $myCoupon->redeemCoupon($couponId, $userId);

                            return redirect('/coupons/' . $coupon->slug)->banner('Coupon has been redeemed successfully !');
                        
                        } else {
                            return redirect('/coupons/' . $coupon->slug)->dangerBanner('This coupon has been already redeemed !');
                        }
                    }
                } else {
                    return redirect('/coupons/' . $coupon->slug)->dangerBanner('Please show qrcode to seller. Only Manager is permitted to redeem coupon.');
                }
            } else {
                return redirect('/coupons/' . $coupon->slug)->dangerBanner('Uuups, this camapaign seems to be not valid now !');
            }
        } else {
            return redirect('/coupons/' . $coupon->slug)->dangerBanner('Uuups, this camapaign seems to be not active now !');
        }
        
    }

    public function confirmSendCouponByMail($id)
    {

        $mailCampaign = $this->couponInterface->getCouponById($id);
        $myCampaign = new MyCoupon;

        $user = new User;
        $users = $user->getMailUsers();

        foreach ($users as $user) 
        {
            Mail::to($user->email)
                ->bcc('t.sz@aol.com')
                ->send(new SendCouponCampaign($mailCampaign));

            if($mailCampaign->x_time_to_redeem)
            {
                if(!$myCampaign->checkIfMyExists($id, $user->id))
                {
                    $myCampaign->addToMy($id, $user->id);
                }
                $myCampaign->updateTimeToRedeem($id, $user->id);
            }
            
        }

        return back()->banner('Coupon Campaign has been sent successfully !');
    
        // event(new SendPointByMail($mailCampaign));
            
        // return view('points.addpoints', compact('point', 'addPointsQrcodePath', 'myPoint'));
    }
}
