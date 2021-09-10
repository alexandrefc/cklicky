<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\MyCoupon;
use Illuminate\Support\Str;
use App\Services\CreateSlug;
use Illuminate\Http\Request;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Http\Requests\ValidateCreateCoupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->couponModel = new Coupon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponModel->getAllCoupons();        
    
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCreateCoupon $request)
    {
        $this->couponModel->addCoupon($request);

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
        $coupon = $this->couponModel->showCoupon($slug);

        return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $coupon = $this->couponModel->getCoupon($slug);

        return view('coupons.edit', compact('coupon'));
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
        $coupon = $this->couponModel->updateCoupon($request, $slug);

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
        $this->couponModel->deleteCoupon($slug);

        $request->session()->flash('flash.banner', 'Coupon has been deleted succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/coupons');
    }

    public function addToMyCoupons($couponId)
    {
        $myCoupon = new MyCoupon;

        if (!($myCoupon->checkIfMyCouponExists($couponId)))
        {
            $myCoupon->addToMyCoupons($couponId);

            return redirect('/coupons')->banner('Coupon has been added to favourites succesfully !');
        
        } else {
            
            return redirect('/coupons')->dangerBanner('Coupon has been already added to favourites !');
            
        }

    }

    public function redeem($couponId, $userId) 
    {
        $myCoupon = new MyCoupon;
        $coupon = new Coupon;

        if (($coupon->checkIfUserIsManager($couponId)))
        {
            if (!($myCoupon->checkIfMyCouponExists($couponId, $userId)))
            {
                $myCoupon->addToMyCoupons($couponId, $userId);
                $myCoupon->redeemCoupon($couponId, $userId);
    
                return redirect('/coupons')->banner('Coupon has been added to favourites and redeemed succesfully !');
                    
            } else {
                if (!($myCoupon->checkIfCouponIsRedeemed($couponId)))
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
