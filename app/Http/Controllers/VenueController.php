<?php

namespace App\Http\Controllers;

use Mapper;
use Carbon\Carbon;

use App\Models\Venue;
use App\Models\MyVenue;
use Illuminate\Http\Request;
use App\Http\Interfaces\VenueInterface;

class VenueController extends Controller
{
    private $venueInterface;
    public function __construct(VenueInterface $venueInterface)
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->venueInterface = $venueInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = $this->venueInterface->getAllVenues();
        $location = "Kraków Polska";
        

        // foreach($venues as $venue) 
        // {
        //     $count = $venue->points->count();
        // }
        // $location = Mapper::location('Kraków');
        // $map = Mapper::map($location, ['markers' => ['icon' => ['symbol' => 'CIRCLE', 'scale' => 10], 'animation' => 'DROP', 'label' => 'Marker', 'title' => 'Marker']])->marker(53.381128999999990000, -1.470085000000040000);
        $map = Mapper::location($location)
            ->map(['markers' => ['title' => 'Bleesk', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]])
            ->marker(52.2296756, 21.0122287);


        

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->venueInterface->createVenue($request);

        $request->session()->flash('flash.banner', 'Venue has been created successfully !');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/venues');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = $this->venueInterface->getVenueById($id);
        $map = Mapper::location($venue->location)
            ->map(['markers' => ['title' => $venue->title, 'label' => ''], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);

        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $venue = $this->venueInterface->getVenueBySlug($slug);

        return view('venues.edit', compact('venue'));
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
        $this->venueInterface->updateVenue($request, $id);

        return redirect('/venues')->banner('Venue has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->venueInterface->deleteVenue($slug);

        return redirect('/venues')->banner('Venue has been deleted successfully !');
    }

    // Add to favourites

    public function addToMyVenues($venueId)
    {
        $myVenue = new MyVenue;
        $userId = auth()->user()->id;
       

        if (!($myVenue->checkIfMyVenueExists($venueId, $userId)))
        {
            $myVenue->addToMyVenues($venueId, $userId);

            return redirect('/venues')->banner('Venue has been added to favourites succesfully !');
        
        } else {
            
            // return redirect('/stamps')->dangerBanner('stamp has been already added to favourites !');
            return back()->dangerBanner('This Venue has been already added to favourites !');
        }

    }

    public function removeFromMy($venueId)
    {
        $myVenue = new MyVenue;

        $myVenue->removeFromMy($venueId);

        return redirect('/myloyalties/' . auth()->user()->id)->banner('Venue has been removed from favourites !');
    }
}
