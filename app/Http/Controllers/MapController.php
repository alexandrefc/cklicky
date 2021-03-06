<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\StampInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Interfaces\CategoryInterface;

class MapController extends Controller
{
    protected $couponModel;
    protected $pointModel;
    protected $stampModel;
    protected $venueModel;

    public function __construct(PointInterface $pointModel, CouponInterface $couponModel, StampInterface $stampModel, VenueInterface $venueModel)
    {
        $this->middleware('auth', ['except' => ['index']]);
        // $this->couponModel = new Coupon;
        // $this->pointModel = new Point;
        $this->couponModel = $couponModel;
        $this->pointModel = $pointModel;
        $this->stampModel = $stampModel;
        $this->venueModel = $venueModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryInterface $categoryInterface)
    {
        // $coupons = $this->couponModel->getAllWebScheduledCoupons();
        // $coupons = $this->couponModel->getAllGenderCoupons();
        // $coupons = $this->couponModel->getAllAgeCoupons();
        // $coupons = $this->couponModel->getAllWebCoupons();
        // $coupons = $this->couponModel->getAllWebScheduledProfiledCoupons();
        $coupons = $this->couponModel->getAllTestingCoupons();

        // $points = $this->pointModel->getAllWebPoints();
        // $points = $this->pointModel->getAllWebPaginatePoints();
        
        // $points = QueryBuilder::for(Point::class)
        //     ->allowedFilters([AllowedFilter::exact('category', 'category_id')])
        //     ->latest()
        //     ->get();

        // $points = $this->pointModel->getAllWebScheduledPoints();
        // $points = $this->pointModel->getAllGenderPoints();
        // $points = $this->pointModel->getAllAgePoints();
        // $points = $this->pointModel->getAllWebScheduledProfiledPoints();
        $points = $this->pointModel->getAllTestingPoints();
        
        // $stamps = $this->stampModel->getAllWebStamps();
        // $stamps = $this->stampModel->getAllWebScheduledStamps();
        // $stamps = $this->stampModel->getAllGenderStamps();
        // $stamps = $this->stampModel->getAllAgeStamps();
        // $stamps = $this->stampModel->getAllWebScheduledProfiledStamps();
        $stamps = $this->stampModel->getAllTestingStamps();

        $venues = $this->venueModel->getAllTestingVenues();

        $categories = $categoryInterface->getAllCategories();
        
        return view('maps.index', compact('coupons', 'points', 'stamps', 'venues', 'categories'));
              
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
