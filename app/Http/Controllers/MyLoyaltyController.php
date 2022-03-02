<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Venue;
use App\Models\Coupon;
use App\Models\MyPoint;
use App\Models\MyStamp;
use App\Models\MyVenue;
use App\Models\MyCoupon;
use Illuminate\Http\Request;
use App\Http\Interfaces\StampInterface;
use App\Http\Interfaces\VenueInterface;


class MyLoyaltyController extends Controller
{
    protected $venueInterface;
    protected $stampInterface;
    public function __construct(VenueInterface $venueInterface, StampInterface $stampInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->couponModel = new Coupon;
        $this->pointModel = new Point;
        $this->stampInterface = $stampInterface;
        $this->venueInterface = $venueInterface;
        $this->myCouponModel = new MyCoupon;
        $this->myPointModel = new MyPoint;
        $this->myStampModel = new MyStamp;
        $this->myVenueModel = new MyVenue;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {

        $myCoupons = $this->myCouponModel->getMyCouponsByUserId();
        $myPoints = $this->myPointModel->getMyPointsByUserId();
        $myStamps = $this->myStampModel->getMyStampsByUserId();
        $myVenues = $this->myVenueModel->getMyVenuesByUserId();
        $points = $this->pointModel->getAllPoints();
        $coupons = $this->couponModel->getAllCoupons();
        $venues = $this->venueInterface->getAllVenues();
        $stamps = $this->stampInterface->getAllStamps();
        

        return view('myloyalties.index', compact('points', 'coupons', 'stamps','myCoupons', 'myPoints', 'venues', 'myStamps', 'myVenues'));
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
