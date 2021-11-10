<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Venue;
use App\Models\Coupon;
use App\Models\MyPoint;
use App\Models\MyCoupon;
use Illuminate\Http\Request;
use App\Http\Interfaces\VenueInterface;


class MyLoyaltyController extends Controller
{
    protected $venueInterface;
    public function __construct(VenueInterface $venueInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->couponModel = new Coupon;
        $this->pointModel = new Point;
        $this->venueInterface = $venueInterface;
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
        $venues = $this->venueInterface->getAllVenues();

        return view('myloyalties.index', compact('points', 'coupons', 'myCoupons', 'myPoints', 'venues'));
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
