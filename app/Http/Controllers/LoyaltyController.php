<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Coupon;
use Illuminate\Support\Str;
use App\Services\CreateSlug;
use Illuminate\Http\Request;
use App\Services\UploadImage;
use App\Services\CreateQrcode;
use App\Http\Requests\ValidateCreateCoupon;

class LoyaltyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->couponModel = new Coupon;
        $this->pointModel = new Point;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = $this->couponModel->getAllCoupons();
        $points = $this->pointModel->getAllPoints();
        
        return view('loyalty.index', compact('coupons', 'points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loyalty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCreateCoupon $request)
    {
        // (new Coupon())->addCoupon($request);
        $this->couponModel->addCoupon($request);

        $request->session()->flash('flash.banner', 'Coupon has been adeed succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/loyalty');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $loyalty = $this->couponModel->getCoupon($slug);

        return view('loyalty.edit', compact('loyalty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $loyalty = $this->couponModel->updateCoupon($request, $slug);

        $request->session()->flash('flash.banner', 'Coupon has been adeed succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/loyalty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
