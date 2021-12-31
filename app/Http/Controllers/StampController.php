<?php

namespace App\Http\Controllers;

use App\Models\MyStamp;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\StampInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Requests\ValidateCreateCoupon;

class StampController extends Controller
{
    private $stampInterface;
    public function __construct(StampInterface $stampInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->stampInterface = $stampInterface;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stamps = $this->stampInterface->getAllstamps();
        $stamps = $this->stampInterface->getAllManagerStamps();
           
        return view('stamps.index', compact('stamps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueInterface $venueInterface, Category $categoryRepo, CouponInterface $couponInterface)
    {
        
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $stamps = $this->stampInterface->getAllStamps();
        $coupons = $couponInterface->getAllCoupons();
        
        // Change to repo
        $categories = $categoryRepo->all();

        if(Gate::allows('admin_only', auth()->user())){
            return view('stamps.create', compact('venues', 'categories', 'stamps', 'coupons'));
        } else {
            return redirect('/loyalties')->dangerBanner('Only Admin is allowed !');
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

        $this->stampInterface->createStamp($request);


        $request->session()->flash('flash.banner', 'stamp has been adeed succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/stamps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $stamp = $this->stampInterface->getStampBySlug($slug);
        

        return view('stamps.show', compact('stamp'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VenueInterface $venueInterface, Category $categoryRepo, CouponInterface $couponInterface, $slug)
    {
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $stamp = $this->stampInterface->getStampBySlug($slug);
        $stamps = $this->stampInterface->getAllStamps();
        $coupons = $couponInterface->getAllCoupons();
        // Change to repo
        $categories = $categoryRepo->all();

        if(Gate::allows('admin_only', auth()->user())){
            return view('stamps.edit', compact('stamp','venues', 'categories', 'stamps', 'coupons'));
        } else {
            return redirect('/stamps')->dangerBanner('Only Admin is allowed !');
        }
        // $stamp = $this->stampInterface->getstampBySlug($slug);
        // $venues = (new VenueRepository())->getAllManagerVenues(auth()->user()->id);

        // return view('stamps.edit', compact('stamp', 'venues'));
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
        $this->stampInterface->updateStamp($request, $slug);

        $request->session()->flash('flash.banner', 'stamp has been updated succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/stamps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $this->stampInterface->deleteStamp($slug);

        $request->session()->flash('flash.banner', 'stamp has been deleted succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/stamps');
    }

    // Add to favourites

    public function addToMyStamps($stampId)
    {
        $myStamp = new MyStamp;
        $userId = auth()->user()->id;
        $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);

        if (!($myStamp->checkIfMyStampExists($stampId, $userId)))
        {
            $myStamp->addToMyStamps($stampId, $userId, $user_time_to_redeem);

            return redirect('/loyalties')->banner('Stamp has been added to favourites succesfully !');
        
        } else {
            
            // return redirect('/stamps')->dangerBanner('stamp has been already added to favourites !');
            return back()->dangerBanner('This Stamp Camapigns has been already added to favourites !');
        }

    }

    public function removeFromMy($stampId)
    {
        $myStamp = new MyStamp;

        $myStamp->removeFromMy($stampId);

        return redirect('/myloyalties/' . auth()->user()->id)->banner('Stamp campaign has been removed from favourites !');
    }

    

    // public function addstampRewardToMystamps($stampId, $userId)
    // {
    //     $mystamp = new Mystamp;
    //     $stamp = $this->stampInterface->getstampById($stampId);
    //     $rewardId = $stamp->reward_id;


    //     if (!($mystamp->checkIfMystampExists($stampId, $userId)))
    //     {
    //         $mystamp->addToMystamps($rewardId, $userId);

    //         return redirect('/stamps')->banner('stamp Reward has been added to favourites succesfully !');
        
    //     } else {
            
    //         return redirect('/stamps')->dangerBanner('This stamp has been already added to favourites !');
    //     }
    // }


    // Adding stamps logic

    public function confirmAddStamps($id)
    {
        $myStamp = new MyStamp;
        $userId = auth()->user()->id;
        $stampId = $id;
        $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);
        
        if (!($myStamp->checkIfMyStampExists($stampId, $userId)))
        {
            $myStamp->addToMyStamps($stampId, $userId, $user_time_to_redeem);
        }

        $stamp = $this->stampInterface->getStampById($id);
        $addStampsQrcodePath = $myStamp->getAddStampsQrcodePath($id);
        $myStamp = $myStamp->getMyStampById($stampId, $userId);
            
        return view('stamps.addstamps', compact('stamp', 'addStampsQrcodePath', 'myStamp'));
    }

    public function addStamps($stampId, $userId) 
    {
        $myStamp = new MyStamp;
        $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);

        $addXStamps = $this->stampInterface->getStampById($stampId)->add_x_stamps;
        $user_reset_time = $this->stampInterface->getUserResetTime($stampId);
        $stamp = $this->stampInterface->getStampById($stampId);

        if($myStamp->checkIfIsAfterTimeReset($stampId, $userId))
        {
            if($this->stampInterface->checkIfNowIsInValidTime($stampId))
            {
                if($myStamp->checkIfNowIsInTimeToRedeem($stampId, $userId))
                {
                    if (($this->stampInterface->checkIfUserIsManager($stampId)))
                    {
                        
                        if (!($myStamp->checkIfMyStampExists($stampId, $userId)))
                        {
                            
                            $myStamp->addToMyStamps($stampId, $userId, $user_time_to_redeem);
                            $myStamp->addStamps($stampId, $userId, $addXStamps, $user_reset_time);

                                if ($myStamp->checkIfRewardIsAvailable($stampId, $userId))
                                {
                                    
                                    $this->stampInterface->addStampRewardToMyStamps($stampId, $userId);
                                    // $this->couponInterface->addCouponRewardToMystamps($stampId, $userId);

                                    return redirect('/stamps')->banner('Reward is added !');
                                } else {
                                    return redirect('/stamps')->banner('stamp has been added to favourites and added succesfully !');
                                }  
                        } else {
                            if (!($myStamp->checkIfStampIsFinished($stampId, $userId)))
                            {
                                $myStamp->addStamps($stampId, $userId, $addXStamps, $user_reset_time);
                                if ($myStamp->checkIfRewardIsAvailable($stamp, $userId))
                                {
                                    $this->stampInterface->addStampRewardToMyStamps($stampId, $userId);

                                    return redirect('/stamps')->banner('Reward is added !');
                                } else {
                                    return redirect('/stamps/' . $stamp->slug)->banner('stamps has been added succesfully !');                    }
                            } else {
                                return redirect('/stamps')->dangerBanner('stamps has been finished !');
                            }
                        }
                    } else {
                        return redirect('/stamps')->dangerBanner('Only Manager is permitted to add stamps!');
                    }
                } else {
                    return redirect('/stamps')->dangerBanner('Too late !');
                }
            } else {
                return redirect('/stamps')->dangerBanner('Camapaign is not valid!');
            }
        } else {
            return redirect('/stamps')->dangerBanner('Wait a minute!');
        }
    }


    
}
