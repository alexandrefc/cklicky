<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MyStamp;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\SendStampCampaign;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Http\Interfaces\StampInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\ValidateCreateStamp;
use App\Http\Requests\ValidateUpdateStamp;
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
    public function index(CouponInterface $couponInterface)
    {
        // $stamps = $this->stampInterface->getAllstamps();
        $stamps = $this->stampInterface->getAllManagerStamps();
        $rewards = $couponInterface->getAllManagerCoupons();

        return view('stamps.index', compact('stamps', 'rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueInterface $venueInterface, CategoryInterface $categoryInterface, CouponInterface $couponInterface)
    {
        
        $venues = $venueInterface->getAllManagerVenues(auth()->user()->id);
        $stamps = $this->stampInterface->getAllStamps();
        $coupons = $couponInterface->getAllCoupons();
        
        
        $categories = $categoryInterface->getAllCategories();

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
    public function store(ValidateCreateStamp $request)
    {

        $this->stampInterface->createStamp($request);


        $request->session()->flash('flash.banner', 'Stamp campaign has been created successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/stamps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CouponInterface $couponInterface, $slug)
    {
        $stamp = $this->stampInterface->getStampBySlug($slug);
        $myStamp = new MyStamp;
        $reward = $couponInterface->getCouponById($stamp->reward_id);

        if(auth()->check()){
            $myStamp = $myStamp->getMyStampById($stamp->id, auth()->user()->id);
        }
        
        

        return view('stamps.show', compact('stamp', 'myStamp', 'reward'));
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
        $stamp = $this->stampInterface->getStampBySlug($slug);
        $stamps = $this->stampInterface->getAllStamps();
        $coupons = $couponInterface->getAllCoupons();
        
        $categories = $categoryInterface->getAllCategories();

        if(Gate::allows('manager_only', $stamp)){
            return view('stamps.edit', compact('stamp', 'venues', 'categories', 'stamps', 'coupons'));
        } else {
            return back()->dangerBanner('Only Admin is allowed !');
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
    public function update(ValidateUpdateStamp $request, $slug)
    {
        $this->stampInterface->updateStamp($request, $slug);

        $request->session()->flash('flash.banner', 'Stamp campaign has been updated succesfully !');
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
        if(Gate::allows('admin_only', auth()->user())){
            $this->stampInterface->deleteStamp($slug);

            $request->session()->flash('flash.banner', 'Stamp campaign has been deleted succesfully !');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/stamps');

        } else {
            return redirect('/loyalties')->dangerBanner('Only Admin is allowed !');
        }
    }

    // Add to favourites

    public function addToMyStamps($stampId)
    {
        $myStamp = new MyStamp;
        $userId = auth()->user()->id;
        // $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);

        if (!($myStamp->checkIfMyStampExists($stampId, $userId)))
        {
            $myStamp->addToMyStamps($stampId, $userId);

            return back()->banner('Stamp campaign has been added to favourites successfully !');
        
        } else {
            
            // return redirect('/stamps')->dangerBanner('stamp has been already added to favourites !');
            return back()->dangerBanner('This Stamp Camapigns has been already added to favourites !');
        }

    }

    public function removeFromMy($stampId)
    {
        $myStamp = new MyStamp;

        $myStamp->removeFromMy($stampId);

        return back()->banner('Stamp campaign has been removed from favourites !');
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
        // $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);
        
        if (!($myStamp->checkIfMyStampExists($stampId, $userId)))
        {
            $myStamp->addToMyStamps($stampId, $userId);
        }

        $stamp = $this->stampInterface->getStampById($id);
        $addStampsQrcodePath = $myStamp->getAddStampsQrcodePath($id);
        $myStamp = $myStamp->getMyStampById($stampId, $userId);
            
        return view('stamps.addstamps', compact('stamp', 'addStampsQrcodePath', 'myStamp'));
    }

    public function addStamps($stampId, $userId) 
    {
        $myStamp = new MyStamp;
        // $user_time_to_redeem = $this->stampInterface->getTimeToRedeem($stampId);

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
                            
                            $myStamp->addToMyStamps($stampId, $userId);
                            $myStamp->addStamps($stampId, $userId, $addXStamps, $user_reset_time);

                                if ($myStamp->checkIfRewardIsAvailable($stampId, $userId))
                                {
                                    
                                    $this->stampInterface->addStampRewardToMyCoupons($stampId, $userId);
                                    // $this->couponInterface->addCouponRewardToMystamps($stampId, $userId);

                                    return redirect('/stamps/' . $stamp->slug)->banner('Congratulations ! You have received reward - check your favourite offers!');
                                } else {
                                    return redirect('/stamps/' . $stamp->slug)->banner('Stamp has been added successfully !');
                                }  
                        } else {
                            if (!($myStamp->checkIfStampIsFinished($stampId, $userId)))
                            {
                                $myStamp->addStamps($stampId, $userId, $addXStamps, $user_reset_time);
                                if ($myStamp->checkIfRewardIsAvailable($stamp, $userId))
                                {
                                    $this->stampInterface->addStampRewardToMyCoupons($stampId, $userId);

                                    return redirect('/stamps/' . $stamp->slug)->banner('Congratulations ! You have received reward - check your favourite offers!');
                                } else {
                                    return redirect('/stamps/' . $stamp->slug)->banner('Stamp has been added added successfully !');                    }
                            } else {
                                return redirect('/stamps/' . $stamp->slug)->dangerBanner('You have already collected all stamps !');
                            }
                        }
                    } else {
                        return redirect('/stamps/' . $stamp->slug)->dangerBanner('Please show qrcode to seller. Only Manager is permitted to add stamps.');
                    }
                } else {
                    return redirect('/stamps/' . $stamp->slug)->dangerBanner('Uuups, Your time to collect stamps is over!');
                }
            } else {
                return redirect('/stamps/' . $stamp->slug)->dangerBanner('Uuups, this camapaign seems to be not valid now !');
            }
        } else {
            return redirect('/stamps/' . $stamp->slug)->dangerBanner('Uuups, it is too early to add stamps again !');
        }
    }

    public function confirmSendStampByMail($id)
    {
        
        $mailCampaign = $this->stampInterface->getStampById($id);
        $myCampaign = new MyStamp;

        // $users = User::all();

        $user = new User;
        $users = $user->getMailUsers();

        foreach ($users as $user) 
        {
            Mail::to($user->email)
                ->bcc('t.sz@aol.com')
                ->send(new SendStampCampaign($mailCampaign));

                if(!$myCampaign->checkIfMyStampExists($id, $user->id))
                {
                    $myCampaign->addToMyStamps($id, $user->id);
                }
                
                $myStamp = $myCampaign->getMyStampById($id, $user->id);
                
                if($mailCampaign->available_through == 'mail' && $myStamp->user_time_to_redeem == NULL)
                {
                    $myCampaign->updateTimeToRedeem($id, $user->id);
                }
        }

        

        return back()->banner('Stamp Campaign has been sent successfully !');
    
        // event(new SendPointByMail($mailCampaign));
            
        // return view('points.addpoints', compact('point', 'addPointsQrcodePath', 'myPoint'));
    }


    
}
