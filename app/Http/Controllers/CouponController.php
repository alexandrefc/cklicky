<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\CouponInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Repositories\VenueRepository;
use App\Http\Requests\ValidateCreateCoupon;

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
        
        $coupons = $this->couponInterface->getAllCoupons();        
    
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueInterface $venueInterface, Category $categoryRepo)
    {
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $coupons = $this->couponInterface->getAllCoupons();
        
        // Change to repo
        $categories = Category::all();
        
        return view('coupons.create', compact('venues', 'categories', 'coupons'));
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

        $request->session()->flash('flash.banner', 'Coupon has been adeed succesfully !');
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
        $myCoupon = new MyCoupon;
        $userId = auth()->user()->id;
        
        if($myCoupon->checkIfMyCouponExists($coupon->id, $userId))
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
        
        return view('coupons.show', compact('coupon', 'isMyCoupon', 'isCouponRedeemed')); 
    }

    public function confirmRedeem($couponId)
    {
        $myCoupon = new MyCoupon;
        $userId = auth()->user()->id;
        
        if (!($myCoupon->checkIfMyCouponExists($couponId, $userId)))
        {
            $myCoupon->addToMyCoupons($couponId, $userId);
        }

        $coupon = $this->couponInterface->getCouponById($couponId);
        $redeemQrcodePath = (new MyCoupon())->getRedeemQrcodePath($coupon->id);
        $myCoupon = $myCoupon->getMyCouponById($couponId, $userId);
            
        return view('coupons.redeem', compact('coupon', 'redeemQrcodePath', 'myCoupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VenueInterface $venueInterface, Category $categoryRepo, $slug)
    {
        $coupon = $this->couponInterface->getCouponbySlug($slug);
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $categories = Category::all();
        $coupons = $this->couponInterface->getAllCoupons();

        return view('coupons.edit', compact('coupon', 'venues', 'categories', 'coupons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->couponInterface->updateCoupon($request, $slug);

        $request->session()->flash('flash.banner', 'Coupon has been updated succesfully !');
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
        $this->couponInterface->deleteCoupon($slug);

        $request->session()->flash('flash.banner', 'Coupon has been deleted succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/coupons');
    }

    public function addToMyCoupons($couponId)
    {
        $myCoupon = new MyCoupon;
        $userId = auth()->user()->id;

        if (!($myCoupon->checkIfMyCouponExists($couponId, $userId)))
        {
            $myCoupon->addToMyCoupons($couponId, $userId);

            return redirect('/coupons')->banner('Coupon has been added to favourites succesfully !');
        
        } else {
            
            return redirect('/coupons')->dangerBanner('Coupon has been already added to favourites !');
            
        }

    }

    public function redeem($couponId, $userId) 
    {
        $myCoupon = new MyCoupon;
        // $coupon = new Coupon;

        if (($this->couponInterface->checkIfUserIsManager($couponId)))
        {
            if (!($myCoupon->checkIfMyCouponExists($couponId, $userId)))
            {
                $myCoupon->addToMyCoupons($couponId, $userId);
                $myCoupon->redeemCoupon($couponId, $userId);
    
                return redirect('/coupons')->banner('Coupon has been added to favourites and redeemed succesfully !');
                    
            } else {
                if (!($myCoupon->checkIfCouponIsRedeemed($couponId, $userId)))
                {
                    $myCoupon->redeemCoupon($couponId, $userId);

                    return redirect('/coupons')->banner('Coupon has been redeemed succesfully !');
                
                } else {
                    return redirect('/coupons')->dangerBanner('Coupon has been already redeemed !');
                }
            }
        } else {
            return redirect('/coupons')->dangerBanner('Only Manager is permitted to redeem!');
        }
        
    }
}
