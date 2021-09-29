<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\MyPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Interfaces\PointInterface;
use App\Http\Interfaces\VenueInterface;
use App\Http\Repositories\VenueRepository;

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
        $points = $this->pointInterface->getAllPoints();

        return view('points.index', compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venues = (new VenueRepository())->getAllManagerVenues(auth()->user()->id);

        if(Gate::allows('admin_only', auth()->user())){
            return view('points.create', compact('venues'));
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
    public function store(Request $request)
    {
        $this->pointInterface->createPoint($request);

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

        return view('points.show', compact('point'));
    }

    public function confirmAddPoints($slug)
    {
        $point = $this->pointInterface->getPointBySlug($slug);
        $addPointsQrcodePath = (new MyPoint())->getAddPointsQrcodePath($point->id);
            
        return view('points.addpoints', compact('point', 'addPointsQrcodePath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $point = $this->pointInterface->getPointBySlug($slug);

        return view('points.edit', compact('point'));
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
            $myPoint->addToMyPoints($pointId);

            return redirect('/points')->banner('Point has been added to favourites succesfully !');
        
        } else {
            
            return redirect('/points')->dangerBanner('Point has been already added to favourites !');
        }

    }

    public function addPoints($pointId, $userId) 
    {
        $myPoint = new MyPoint;
        // $point = new Point;
        // $pointR = $point->getPointById($pointId);
        // $addXPoints = $pointR->add_x_points;

        if (($this->pointInterface->checkIfUserIsManager($pointId)))
        {
            if (!($myPoint->checkIfMyPointExists($pointId, $userId)))
            {
                $myPoint->addToMyPoints($pointId, $userId);
                $myPoint->addPoints($pointId, $userId);
    
                return redirect('/points')->banner('Point has been added to favourites and added succesfully !');
                    
            } else {
                if (!($myPoint->checkIfPointIsFinished($pointId, $userId)))
                {
                    $myPoint->addPoints($pointId, $userId);
                    return redirect('/points')->banner('Points has been added succesfully !');
                
                } else {
                    return redirect('/points')->dangerBanner('Points has been already added !');
                }
            }
        } else {
            return redirect('/points')->dangerBanner('Only Manager is permitted to add points!');
        }
        
    }
}
