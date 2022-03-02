<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Point;
use App\Models\MyPoint;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\SendPointCampaign;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Repositories\VenueRepository;
use App\Http\Requests\ValidateCreatePoint;
use App\Http\Requests\ValidateUpdatePoint;
use App\Http\Requests\ValidateCreateCoupon;
use App\Http\Interfaces\PointOptionInterface;
use App\Http\Repositories\PointOptionRepository;

class PointController extends Controller
{
    private $pointInterface;
    public function __construct(PointInterface $pointInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->pointInterface = $pointInterface;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CouponInterface $couponInterface)
    {
        // $points = $this->pointInterface->getAllPoints();
        $points = $this->pointInterface->getAllManagerPoints();
        $rewards = $couponInterface->getAllManagerCoupons();
           
        return view('points.index', compact('points', 'rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueInterface $venueInterface, CategoryInterface $categoryInterface, CouponInterface $couponInterface)
    {
        
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $points = $this->pointInterface->getAllManagerPoints();
        $coupons = $couponInterface->getAllManagerCoupons();
        $categories = $categoryInterface->getAllCategories();

        if(Gate::allows('admin_only', auth()->user())){
            return view('points.create', compact('venues', 'categories', 'points', 'coupons'));
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
    public function store(ValidateCreatePoint $request)
    {
       
        $this->pointInterface->createPoint($request);


        $request->session()->flash('flash.banner', 'Point campaign has been created successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/points');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CouponInterface $couponInterface, $slug)
    {
        $point = $this->pointInterface->getPointBySlug($slug);
        $reward = $couponInterface->getCouponById($point->reward_id);
        $myPoint = new MyPoint;

        if(auth()->check())
        {
            $myPoint = $myPoint->getMyPointById($point->id, auth()->user()->id);
        }

        return view('points.show', compact('point', 'reward', 'myPoint'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VenueInterface $venueInterface, CategoryInterface $categoryInterface, CouponInterface $couponInterface, $slug)
    {
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $point = $this->pointInterface->getPointBySlug($slug);
        $points = $this->pointInterface->getAllManagerPoints();
        $coupons = $couponInterface->getAllManagerCoupons();
      
        $categories = $categoryInterface->getAllCategories();

        if(Gate::allows('manager_only', $point)){
            return view('points.edit', compact('point','venues', 'categories', 'points', 'coupons'));
        } else {
            return back()->dangerBanner('Only Admin is allowed !');
        }
        // $point = $this->pointInterface->getPointBySlug($slug);
        // $venues = (new VenueRepository())->getAllManagerVenues(auth()->user()->id);

        // return view('points.edit', compact('point', 'venues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdatePoint $request, $slug)
    {
        $this->pointInterface->updatePoint($request, $slug);

        $request->session()->flash('flash.banner', 'Point campaign has been updated successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/points');
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
            $this->pointInterface->deletePoint($slug);

            $request->session()->flash('flash.banner', 'Point campaign has been deleted successfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/points');
        } else {
            return redirect('/loyalty')->dangerBanner('Only Admin is allowed !');
        }

        
    }

    // Add to favourites

    public function addToMyPoints($pointId)
    {
        $myPoint = new MyPoint;
        $userId = auth()->user()->id;
        // $user_time_to_redeem = $this->pointInterface->getTimeToRedeem($pointId);

        if (!($myPoint->checkIfMyExists($pointId, $userId)))
        {
            $myPoint->addToMy($pointId, $userId);

            $myPoint->activateMy($pointId, $userId);

            return back()->banner('Point campaign has been added to favourites successfully !');
        
        } elseif (!($myPoint->checkIfMyIsActive($pointId, $userId))) {
            
            $myPoint->activateMy($pointId, $userId);

            return back()->banner('Point campaign has been added to favourites successfully !');
            
        } else {

            return back()->dangerBanner('This Point campaign has been already added to favourites !');
        }

    }

    public function deactivateMy($pointId)
    {
        $myPoint = new MyPoint;

        $myPoint->deactivateMy($pointId);

        return back()->banner('Point campaign has been removed from favourites !');
    }

    public function removeFromMy($pointId)
    {
        $myPoint = new MyPoint;

        $myPoint->removeFromMy($pointId);

        // return redirect('/myloyalties/' . auth()->user()->id)->banner('Point campaign has been removed from favourites !');
        return back()->banner('Point campaign has been removed from favourites !');
    }

    // public function addPointRewardToMyPoints($pointId, $userId)
    // {
    //     $myPoint = new MyPoint;
    //     $point = $this->pointInterface->getPointById($pointId);
    //     $rewardId = $point->reward_id;


    //     if (!($myPoint->checkIfMyExists($pointId, $userId)))
    //     {
    //         $myPoint->addToMy($rewardId, $userId);

    //         return redirect('/points')->banner('Point Reward has been added to favourites succesfully !');
        
    //     } else {
            
    //         return redirect('/points')->dangerBanner('This Point has been already added to favourites !');
    //     }
    // }


    // Adding points logic

    public function confirmAddPoints($id)
    {
        $myPoint = new MyPoint;
        $userId = auth()->user()->id;
        $pointId = $id;
        // $user_time_to_redeem = $this->pointInterface->getTimeToRedeem($pointId);
        
        if (!($myPoint->checkIfMyExists($pointId, $userId)))
        {
            $myPoint->addToMy($pointId, $userId);
        }

        $point = $this->pointInterface->getPointById($id);
        $addPointsQrcodePath = $myPoint->getAddPointsQrcodePath($id);
        $myPoint = $myPoint->getMyPointById($pointId, $userId);
            
        return view('points.addpoints', compact('point', 'addPointsQrcodePath', 'myPoint'));
    }

    public function addPoints($pointId, $userId) 
    {
        $myPoint = new MyPoint;
        // $user_time_to_redeem = $this->pointInterface->getTimeToRedeem($pointId);

        $addXPoints = $this->pointInterface->getPointById($pointId)->add_x_points;
        $user_reset_time = $this->pointInterface->getUserResetTime($pointId);
        $point = $this->pointInterface->getPointById($pointId);

        if($this->pointInterface->checkIfCampaignIsActive($pointId))
        {
            if($myPoint->checkIfIsAfterTimeReset($pointId, $userId))
            {
                if($this->pointInterface->checkIfNowIsInValidTime($pointId))
                {
                    if($myPoint->checkIfNowIsInTimeToRedeem($pointId, $userId))
                    {
                        if (($this->pointInterface->checkIfUserIsManager($pointId)))
                        {
                            if (!($myPoint->checkIfMyExists($pointId, $userId)))
                            {
                                
                                // $myPoint->addToMy($pointId, $userId, $user_time_to_redeem);
                                $myPoint->addToMy($pointId, $userId);
                                $myPoint->addPoints($pointId, $userId, $addXPoints, $user_reset_time);

                                    if ($myPoint->checkIfRewardIsAvailable($pointId, $userId))
                                    {
                                        
                                        $this->pointInterface->addPointRewardToMyCoupons($pointId, $userId);
                                        // $this->couponInterface->addCouponRewardToMyPoints($pointId, $userId);

                                        return redirect('/points/' . $point->slug)->banner('Congratulations - Reward have been added - check your favourite offers!');
                                    } else {
                                        return redirect('/points/' . $point->slug)->banner('Points have been added successfully !');
                                    }  
                            } else {
                                if (!($myPoint->checkIfPointIsFinished($pointId, $userId)))
                                {
                                    $myPoint->addPoints($pointId, $userId, $addXPoints, $user_reset_time);
                                    if ($myPoint->checkIfRewardIsAvailable($point, $userId))
                                    {
                                        $this->pointInterface->addPointRewardToMyCoupons($pointId, $userId);

                                        return redirect('/points/' . $point->slug)->banner('Congratulations ! You have received reward - check your favourite offers!');
                                    } else {
                                        return redirect('/points/' . $point->slug)->banner('Points have been added successfully !');                    
                                    }
                                } else {
                                    return redirect('/points/' . $point->slug)->dangerBanner('You have already collected all points !');
                                }
                            }
                        } else {
                            return redirect('/points/' . $point->slug)->dangerBanner('Please show qrcode to seller. Only Manager is permitted to add points.');
                        }
                    } else {
                        return redirect('/points/' . $point->slug)->dangerBanner('Uuups, Your time to collect points is over!');
                    }
                } else {
                    return redirect('/points/' . $point->slug)->dangerBanner('Uuups, this camapaign seems to be not valid now !');
                }
            } else {
                return redirect('/points/' . $point->slug)->dangerBanner('Uuups, it is too early to add points again !');
            }
        } else {
            return redirect('/points/' . $point->slug)->dangerBanner('Uuups, this camapaign seems to be not active now !');
        }
    }

    public function confirmSendPointByMail($id)
    {
        
        $mailCampaign = $this->pointInterface->getPointById($id);
        $myCampaign = new MyPoint;

        // $users = User::all();

        $user = new User;
        $users = $user->getMailUsers();

        foreach ($users as $user) 
        {
            Mail::to($user->email)
                ->bcc('t.sz@aol.com')
                ->send(new SendPointCampaign($mailCampaign));

                if(!$myCampaign->checkIfMyExists($id, $user->id))
                {
                    $myCampaign->addToMy($id, $user->id);
                }
                
                $myPoint = $myCampaign->getMyPointById($id, $user->id);
                
                if($mailCampaign->available_through == 'mail' && $myPoint->user_time_to_redeem == NULL)
                {
                    $myCampaign->updateTimeToRedeem($id, $user->id);
                }
            
        }

        

        return back()->banner('Point Campaign has been sent successfully !');
    
        // event(new SendPointByMail($mailCampaign));
            
        // return view('points.addpoints', compact('point', 'addPointsQrcodePath', 'myPoint'));
    }


    
}
