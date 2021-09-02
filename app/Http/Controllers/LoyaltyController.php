<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class LoyaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = (new Coupon())->getAllCoupons();

        $loyalties = $coupons;
        
    
        return view('loyalty.index', compact('loyalties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loyalty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCreateCoupon $request)
    {
        $newImageName = (new UploadImage())->uploadImage($request);
        
        (new Coupon())->addCoupon($request, $newImageName);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $image = $request->image;
        // $imagePath = $request->file('image')->storeAs('images', $newImageName);
        // $fitImage = Storage::get($imagePath);
        // return Storage::download($imagePath);


        Image::make($image)->fit(700, 400)->save($image);
        $image->storeAs('public/images', $newImageName);

        $random = uniqid($request->title, true) . random_int(1111, 9999);

        $urlSlug = Str::of($random)->slug('-');
        // $urlSlug = Str::of($request->title)->slug('-') . $random;

        // $qrcodeEndPoint = 'http://proximityblog.test/loyalties/' . $urlSlug;
        $qrcodeEndPoint = 'http://proximityblog.test/points/' . $urlSlug;

        $qrcodeName = uniqid() . '-' . $request->title . '.' . 'svg';
        QrCode::size(500)
            ->errorCorrection('H')
            ->generate($qrcodeEndPoint, storage_path('app/public/images/qrcodes/' . $qrcodeName));

        $qrcodePath = $qrcodeName;

        return redirect('/blog')
            ->with('message', 'Your post has been added !');
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
