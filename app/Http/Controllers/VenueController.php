<?php

namespace App\Http\Controllers;

use Mapper;
use Carbon\Carbon;

use App\Models\Venue;
use App\Models\MyVenue;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Geocoder\Facades\Geocoder;
use App\Http\Interfaces\VenueInterface;
use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\ValidateCreateVenue;
use App\Http\Requests\ValidateUpdateVenue;

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
        $venues = $this->venueInterface->getAllManagerVenues();
        $location = "Kraków Polska";
        
       

        // $locations = $this->venueInterface->getAllManagerVenues();
        // $mapLocations = $locations->location;

        // dd($mapLocations);
        

        // foreach($venues as $venue) 
        // {
        //     $count = $venue->points->count();
        // }
        // $location = Mapper::location('Kraków');
        // $map = Mapper::map($location, ['markers' => ['icon' => ['symbol' => 'CIRCLE', 'scale' => 10], 'animation' => 'DROP', 'label' => 'Marker', 'title' => 'Marker']])->marker(53.381128999999990000, -1.470085000000040000);
        // $map = Mapper::location($location)
        //     ->map(['markers' => ['title' => 'Bleesk', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]])
        //     ->marker(52.2296756, 21.0122287);

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryInterface $categoryInterface)
    {
        if(Gate::allows('admin_only', auth()->user())){
            $categories = $categoryInterface->getAllCategories();
            return view('venues.create', compact('categories'));
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
    public function store(ValidateCreateVenue $request)
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
        // $map = Mapper::location($venue->location)
        //     ->map(['markers' => ['title' => $venue->title, 'label' => ''], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);

        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryInterface $categoryInterface, $slug)
    {
        $venue = $this->venueInterface->getVenueBySlug($slug);
        if(Gate::allows('venue_manager_only', $venue))
        {
            $categories = $categoryInterface->getAllCategories();

            return view('venues.edit', compact('venue', 'categories'));
        } else {
            return back()->dangerBanner('Only Admin is allowed !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUpdateVenue $request, $id)
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
        if(Gate::allows('admin_only', auth()->user())){
            $this->venueInterface->deleteVenue($slug);

            return redirect('/venues')->banner('Venue has been deleted successfully !');
        } else {
            return redirect('/loyalties')->dangerBanner('Only Admin is allowed !');
        }
    }

    // Add to favourites

    public function addToMyVenues($venueId)
    {
        $myVenue = new MyVenue;
        $userId = auth()->user()->id;
       

        if (!($myVenue->checkIfMyVenueExists($venueId, $userId)))
        {
            $myVenue->addToMyVenues($venueId, $userId);

            return back()->banner('Venue has been added to favourites successfully !');
        
        } else {
            
            // return redirect('/stamps')->dangerBanner('stamp has been already added to favourites !');
            return back()->dangerBanner('This Venue has been already added to favourites !');
        }

    }

    public function removeFromMy($venueId)
    {
        $myVenue = new MyVenue;

        $myVenue->removeFromMy($venueId);

        return back()->banner('Venue has been removed from favourites !');
    }
}
