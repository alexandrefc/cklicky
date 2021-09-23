<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}
    
    {{-- @extends('layouts.application')
    @section('content') --}}
        <div class="background-image grid grid-cols-1 m-auto">
            <div class="flex text-gray-100 pb-32 ">
                <div class="m-auto pb-16 pt-5 sm:m-auto w-4/5 block text-center">
                    <h1 class="sm:text-white text-5xl font-extrabold text-shadow-md pb-5 md:text-6xl">
                       Welcome to cklicky.com !
                    </h1>
                    <h1 class="text-white font-semibold text-shadow-md pb-14 text-xl sm:text-4xl">
                        A white label loyalty solutions platform   
                    </h1>
                    <span class="m-auto text-gray-100 py-2 font-bold text-l pb-14 md:text-2xl">
                        We develop ready to use custom branded web solutions in just 14 days!
                    </span>
                    <span class="m-auto text-gray-100 py-2 font-bold text-l pb-14 md:text-2xl">
                        We hope you love it.
                    </span>
                    {{-- <a 
                        class="text-center m-auto text-gray-100 py-2 px-4 font-bold text-xl"
                        href="/loyalties">
                        We develop ready to use custom branded web solutions in just 14 days!
                        <br>
                        <br>
                        No coding skills reqiured
                    </a> --}}
                </div>
            </div>
        </div>
    
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mb-10 mx-auto py-15 border-b border-gray-200">
            <div>
                <img 
                    src="{{ asset('/layout/without-app-coupons.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl mb-10 mt-12"
                    >
            </div>
            
            <div class="m-auto w-full sm:w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Your clients are tiered of constantly downloding new apps ?
                </h2>
                <p class="py-5 text-gray-500 text-s">
                    With our easy to use admin panel you can setup coupon, stamp & point campaings and deliver them without a need to donwload the app to your customers. 
                </p>
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    We completely rebrand the platform with your brand. 
                </p>
                <div class="text-center">
                    <a 
                        class="bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-3 rounded-3xl w-screen"
                        href="/login">
                        Try cKlicky.com for free !
                    </a>
                </div>
            </div>
        </div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mb-10 mx-auto py-15 border-b border-gray-200">
            <div class="m-auto w-full sm:w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    How does coupons, stamps & points work without the app ?
                </h2>
                <p class="py-5 text-gray-500 text-s">
                    Just login using yuor email and you are set up. Now you can choose your loyalty or receive it from your favourite venue. 
                </p>
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    We completely rebrand the platform with your brand. 
                </p>
                <div class="text-center">
                    <a 
                        class="bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-3 rounded-3xl w-screen"
                        href="/login">
                        Try cKlicky.com for free !
                    </a>
                </div>
            </div>
            <div>
                <img 
                    src="{{ asset('/layout/custom-branded-loyalty-solution-lp.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl mb-10 mt-12"
                    >
            </div>
        </div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mb-10 mx-auto py-15 border-b border-gray-200">
            <div>
                <img 
                    src="{{ asset('/layout/rebranding-loyalty-coupons-lp.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl mb-10 mt-12"
                    >
            </div>
            
            <div class="m-auto w-full sm:w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Redeem yuor coupon or add points without a need to download the app !
                </h2>
                <p class="py-5 text-gray-500 text-s">
                    All you need is to scan the qr code with the coupon or stamp camapign and show it to the seller. Seller will redeem coupon or add points by just one click. 
                </p>
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    We completely rebrand the platform with your brand. 
                </p>
                <div class="text-center">
                    <a 
                        class="bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-3 rounded-3xl w-screen"
                        href="/login">
                        Try cKlicky.com for free !
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center p-10 bg-gradient-to-b from-yellow-400 to-red-500 text-white">
            <h2 class="text-2xl pb-5 text-l">
                Service we provide...
            </h2>
            <span class="font-extrabold block text-4xl py-1">
                We build a web app with admin panel with your branding. 
            </span>
            <span class="font-extrabold block text-4xl py-1">
                We take care of technology, development and new feature releases.
            </span>
            <span class="font-extrabold block text-4xl py-1">
                <br>
            </span>
            <span class="font-extrabold block text-4xl py-1">
                All this in just 14 days.
            </span>
        </div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mb-10 mx-auto">
            <div class="m-auto w-full sm:w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Intrested in having your own loyalty services under your brand ?
                </h2>
                <p class="py-5 text-gray-500 text-s">
                    With our easy to use admin panel you can setup coupon, stamp & point campaings and deliver them without a need to donwload the app to your customers. 
                </p>
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    We completely rebrand the platform with your brand. 
                </p>
                <div class="text-center">
                    <a 
                        class="bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-3 rounded-3xl w-screen"
                        href="/login">
                        Try cKlicky.com for free !
                    </a>
                </div>
            </div>
            <div>
                <img 
                    src="{{ asset('/layout/redeem-coupon-without-app.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl mb-10 mt-12"
                    >
            </div>
        </div>
        <div class="text-center py-10 bg-gray-100">
            <h2 class="text-4xl font-bold">
                Rebranding is a simple and quick process
            </h2>
            <p class="m-auto w-4/5 text-gray-700">
                Just send us your logo and domain details - we will take care of the rest
            </p>
    
        </div>
        <div class="sm:grid grid-cols-2 w-4/5 m-auto  pt-10">
            <div class="flex bg-white-700 text-gray-700 pt-15">
                <div class="m-auto pb-16 sm:m-auto w-4/5 block font-sans">
                    <span class="text-s block pb-1">
                        1. We designate a person to guide you during the rebranding process and answer all questions that come up. 
                    </span>
                    <span class="text-s block pb-1">
                        2. We provide you a detailed list of assets required to proceed with the development.
                    </span>
                    <span class="text-s block pb-1">
                        3. Based on your requirements, our development team creates a customised CMS with your branding and at the domain you choose.
                    </span>
                    <span class="text-s block pb-1">
                        4. After your platform is ready, you have 14 days to test it thoroughly and provide us your feedback or requests for change.
                    </span>
                    <span class="text-s block pb-1">
                        5. Optionally you can decide on host the service on your servers.
                    </span>
                    <span class="text-s block pb-1">
                        6. You are eady to go ! Create your first white labeled campaign.
                    </span>
                    {{-- <h3 class="text-xl font-bold py-10">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio ratione placeat reiciendis enim 
                        perferendis cupiditate, quibusdam nisi excepturi laudantium facilis rerum quasi in eum vero. 
                        Libero ad sint recusandae suscipit!
                    </h3> --}}
                    
                        <div class="mt-10 text-center">
                            <a 
                                class="bg-purple-500 text-white text-s font-extrabold
                                py-3 px-6 mr-2 rounded-3xl"
                                href="/login">
                                Learn more
                            </a>
                        </div>
                </div>
            </div>
            <div class="">
                <img 
                    src="{{ asset('/layout/white-label-solution.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl"
                    >
            </div>
    
        </div>
        <div class="text-center py-16 bg-gray-100">
            <div class="text-center items-center">
                <a 
                class="bg-blue-500 text-white text-s font-extrabold py-3 px-3 rounded-3xl ml-3"
                href="/login">
                Try cKlicky.com for free !
            </a>
            </div>
        </div>
        
    
        
    
    {{-- @endsection --}}
    
</x-app-layout>