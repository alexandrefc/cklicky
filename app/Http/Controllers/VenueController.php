<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

use App\Http\Interfaces\VenueInterface;
use Mapper;

class VenueController extends Controller
{
    private $venueInterface;
    public function __construct(VenueInterface $venueInterface)
    {
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

        $request->session()->flash('flash.banner', 'Venue has been created succesfully !');
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
