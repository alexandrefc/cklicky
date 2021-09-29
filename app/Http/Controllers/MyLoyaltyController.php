<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Coupon;
use App\Models\MyCoupon;
use App\Models\MyPoint;
use App\Models\Venue;
use Illuminate\Http\Request;

class MyLoyaltyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->couponModel = new Coupon;
        $this->pointModel = new Point;
        $this->venueModel = new Venue();
        $this->myCouponModel = new MyCoupon;
        $this->myPointModel = new MyPoint;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $myCoupons = $this->myCouponModel->getMyCouponsByUserId();
        $myPoints = $this->myPointModel->getMyPointsByUserId();
        $points = $this->pointModel->getAllPoints();
        $coupons = $this->couponModel->getAllCoupons();

        return view('myloyalties.index', compact('points', 'coupons', 'myCoupons', 'myPoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
