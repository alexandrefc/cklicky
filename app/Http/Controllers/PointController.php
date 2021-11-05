<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\MyPoint;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Repositories\VenueRepository;
use App\Http\Interfaces\PointOptionInterface;
use App\Http\Repositories\PointOptionRepository;
use App\Http\Requests\ValidateCreateCoupon;

class PointController extends Controller
{
    private $pointInterface;
    public function __construct(PointInterface $pointInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->pointModel = new Point;
        $this->pointInterface = $pointInterface;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $points = $this->pointInterface->getAllPoints();
        $points = $this->pointInterface->getAllManagerPoints();
           
        return view('points.index', compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VenueRepository $venueRepo, Category $categoryRepo)
    {

        $venues = $venueRepo->getAllManagerVenues(auth()->user()->id);
        $points = $this->pointInterface->getAllPoints();
        
        // Change to repo
        $categories = $categoryRepo->all();

        if(Gate::allows('admin_only', auth()->user())){
            return view('points.create', compact('venues', 'categories', 'points'));
        } else {
            return redirect('/points')->dangerBanner('Only Admin is allowed !');
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

        $this->pointInterface->createPoint($request);
       
        // $this->pointOptionInterface->createPointOption($request);

        $request->session()->flash('flash.banner', 'point has been adeed succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/points');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $point = $this->pointInterface->getPointBySlug($slug);
        // $myPoint = new MyPoint;

        // if(($myPoint->getMyPointById($pointId, $userId)))
        // {
        //     $my = 1;
        // } else {
        //     $my = 0;
        // }



        return view('points.show', compact('point'));
    }

    public function confirmAddPoints($id)
    {
        $myPoint = new MyPoint;
        $userId = auth()->user()->id;
        $pointId = $id;
        
        if (!($myPoint->checkIfMyPointExists($pointId, $userId)))
        {
            $myPoint->addToMyPoints($pointId, $userId);
        }

        $point = $this->pointInterface->getPointById($id);
        $addPointsQrcodePath = $myPoint->getAddPointsQrcodePath($id);
        $myPoint = $myPoint->getMyPointById($pointId, $userId);
            
        return view('points.addpoints', compact('point', 'addPointsQrcodePath', 'myPoint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VenueRepository $venueRepo, Category $categoryRepo, $slug)
    {
        $venues = $venueRepo->getAllManagerVenues(auth()->user()->id);
        $point = $this->pointInterface->getPointBySlug($slug);
        // Change to repo
        $categories = $categoryRepo->all();

        if(Gate::allows('admin_only', auth()->user())){
            return view('points.edit', compact('point','venues', 'categories'));
        } else {
            return redirect('/points')->dangerBanner('Only Admin is allowed !');
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
    public function update(Request $request, $slug)
    {
        $this->pointInterface->updatePoint($request, $slug);

        $request->session()->flash('flash.banner', 'point has been updated succesfully !');
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
        $this->pointInterface->deletePoint($slug);

        $request->session()->flash('flash.banner', 'point has been deleted succesfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/points');
    }

    public function addToMyPoints($pointId)
    {
        $myPoint = new MyPoint;
        $userId = auth()->user()->id;

        if (!($myPoint->checkIfMyPointExists($pointId, $userId)))
        {
            $myPoint->addToMyPoints($pointId, $userId);

            return redirect('/points')->banner('Point has been added to favourites succesfully !');
        
        } else {
            
            return redirect('/points')->dangerBanner('Point has been already added to favourites !');
        }

    }

    public function addPoints($pointId, $userId) 
    {
        $myPoint = new MyPoint;
        
        if($myPoint->checkIfIsAfterTimeReset($pointId, $userId))
        {
            if($this->pointInterface->checkIfNowIsInValidTime($pointId))
            {
                if($myPoint->checkIfNowIsInTimeToRedeem($pointId, $userId))
                {
                    if (($this->pointInterface->checkIfUserIsManager($pointId)))
                    {
                        if (!($myPoint->checkIfMyPointExists($pointId, $userId)))
                        {
                            $myPoint->addToMyPoints($pointId, $userId);
                            $myPoint->addPoints($pointId, $userId);

                                if ($myPoint->checkIfRewardIsAvailable($pointId, $userId))
                                {
                                    $this->pointInterface->addPointRewardToMyPoints($pointId, $userId);

                                    return redirect('/points')->banner('Reward is added !');
                                } else {
                                    return redirect('/points')->banner('Point has been added to favourites and added succesfully !');
                                }  
                        } else {
                            if (!($myPoint->checkIfPointIsFinished($pointId, $userId)))
                            {
                                $myPoint->addPoints($pointId, $userId);
                                if ($myPoint->checkIfRewardIsAvailable($pointId, $userId))
                                {
                                    $this->pointInterface->addPointRewardToMyPoints($pointId, $userId);

                                    return redirect('/points')->banner('Reward is added !');
                                } else {
                                    return redirect('/points')->banner('Points has been added succesfully !');                    }
                            } else {
                                return redirect('/points')->dangerBanner('Points has been finished !');
                            }
                        }
                    } else {
                        return redirect('/points')->dangerBanner('Only Manager is permitted to add points!');
                    }
                } else {
                    return redirect('/points')->dangerBanner('Too late !');
                }
            } else {
                return redirect('/points')->dangerBanner('Camapaign is not valid!');
            }
        } else {
            return redirect('/points')->dangerBanner('Wait a minute!');
        }
    }


    // public function addPointRewardToMyPoints($pointId, $userId)
    // {
    //     $myPoint = new MyPoint;
    //     $point = $this->pointInterface->getPointById($pointId);
    //     $rewardId = $point->reward_id;


    //     if (!($myPoint->checkIfMyPointExists($pointId, $userId)))
    //     {
    //         $myPoint->addToMyPoints($rewardId, $userId);

    //         return redirect('/points')->banner('Point Reward has been added to favourites succesfully !');
        
    //     } else {
            
    //         return redirect('/points')->dangerBanner('This Point has been already added to favourites !');
    //     }
    // }

    
}
