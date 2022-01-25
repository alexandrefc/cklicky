<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\StampInterface;
use App\Http\Interfaces\CouponInterface;

class AboutController extends Controller
{
    protected $couponModel;
    protected $pointModel;
    protected $stampModel;

    public function __construct(PointInterface $pointModel, CouponInterface $couponModel, StampInterface $stampModel)
    {
        // $this->middleware('auth', ['except' => ['show']]);
        // $this->couponModel = new Coupon;
        // $this->pointModel = new Point;
        $this->couponModel = $couponModel;
        $this->pointModel = $pointModel;
        $this->stampModel = $stampModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = $this->pointModel->getAllWebPoints();

        return view('about.index', compact('points'));
    }

    public function myloyalties()
    {
        $points = (new Point())->getAllPoints();
        $coupons = (new Coupon())->getAllCoupons();

        return view('myloyalties.index', compact('points', 'coupons'));
    }

    public function whiteLabelSolution()
    {

        return view('about.index/#whitelabelsolution');
    }

    public function faq()
    {

        return view('cms.howto');
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
