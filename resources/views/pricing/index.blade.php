<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body class="font-sans bg-gray-100 mt-16"> --}}
    
    <div class="min-h-screen flex justify-center items-center pt-16 mb-32">
        <div class="">
            <div class="text-center font-semibold">
                <h1 class="text-5xl">
                    <span class="text-blue-700 tracking-wide">All-In </span>
                    <span>Plan</span>
                </h1>
                <p class="pt-6 text-xl text-gray-400 font-normal w-full px-8 md:w-full">
                    No tricks. Choose a one simple All-In Subscription.
                </p>
            </div>
            <div class="pt-24 flex flex-row">
                <!-- Basic Card -->
                {{-- <div class="w-96 p-8 bg-white text-center rounded-3xl pr-16 shadow-xl">
                    <h1 class="text-black font-semibold text-2xl">Basic</h1>
                    <p class="pt-2 tracking-wide">
                        <span class="text-gray-400 align-top">$ </span>
                        <span class="text-3xl font-semibold">10</span>
                        <span class="text-gray-400 font-medium">/ user</span>
                    </p>
                    <hr class="mt-4 border-1">
                    <div class="pt-8">
                        <p class="font-semibold text-gray-400 text-left">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                Get started with <span class="text-black">messaging</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                Flexible <span class="text-black">team meetings</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                <span class="text-black">5 TB</span> cloud storage
                            </span>
                        </p>

                        <form  
                            class="w-full py-4 bg-blue-600 mt-8 rounded-xl text-white"
                            action="/create-checkout-session.php" method="POST">
                            @csrf
                            <input type="hidden" name="lookup_key" value="SP" />
                            <button class="pl-2 font-medium"
                                id="checkout-and-portal-button" 
                                type="submit">Choose Plan</button>
                            <span class="pl-2 material-icons align-middle text-sm">
                            -->
                            </span>
                          </form>
                    </div>
                </div> --}}
                <!-- StartUp Card -->
                <div class="w-9/12 sm:w-7/12 p-8 m-auto bg-gray-900 text-center rounded-3xl text-white border-4 shadow-xl border-white transform scale-125">
                    <h1 class="text-white font-semibold text-2xl mt-3">White label solution</h1>
                    <p class="pt-2 tracking-wide">
                        <span class="text-gray-400 align-top">$ </span>
                        <span class="text-3xl font-semibold">199</span>
                        <span class="text-gray-400 font-medium">/ month</span>
                    </p>
                    <hr class="mt-4 border-1 border-gray-600">
                    <div class="pt-8">
                        <p class="font-semibold text-gray-400 text-left">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                All loyalty <span class="text-white">Campaigns</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                7-14 Day <span class="text-white">delivery</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                <span class="text-white">Rebranding</span> included
                            </span>
                        </p>
                        
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                 <span class="text-white">Profiling and scheduling</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                <span class="text-white">Unlimited</span> campaigns
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                <span class="text-white">Unlimited</span> accounts
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                <span class="text-white">Technical </span> Support
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5 mb-6">
                            <span class="material-icons align-middle">
                                +
                            </span>
                            <span class="pl-2">
                                <span class="text-white">14 days </span> Free Trail
                            </span>
                        </p>

                        {{-- <form  
                            class="w-full py-4 bg-blue-600 mt-8 rounded-xl text-white"
                            action="/create-checkout-session.php" method="POST">
                            @csrf
                            <input type="hidden" name="lookup_key" value="WLSB" />
                            <button class="pl-2 font-medium"
                                id="checkout-and-portal-button" 
                                type="submit">Choose Plan</button>
                            <span class="pl-2 material-icons align-middle text-sm">
                                east
                            </span>
                        </form> --}}

                        @if(Gate::allows('admin_only', auth()->user()))
                            <form  
                                class="w-full py-4 bg-blue-600 mt-8 rounded-xl text-white"
                                action="/create-checkout-session.php" method="POST">
                                @csrf
                                <input type="hidden" name="lookup_key" value="PP" />
                                <button class="pl-2 font-medium"
                                    id="checkout-and-portal-button" 
                                    type="submit">Subscribe</button>
                                <span class="pl-2 material-icons align-middle text-sm">
                                    
                                </span>
                            </form>
                        @endif
                        @guest
                            <div class="inline-flex rounded-md shadow">
                                <a href="/register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    Get free trial
                                </a>
                            </div>
                        @endguest
                        
                    </div>
                    <div class="absolute top-3 right-2">
                        <p class="bg-green-400 font-semibold px-4 py-1 rounded-full text-xs">50% off for yearly payments</p>
                    </div>
                </div>
                <!-- Enterprise Card -->
                {{-- <div class="w-96 p-8 bg-white text-center rounded-3xl pl-16 shadow-xl">
                    <h1 class="text-black font-semibold text-2xl">Enterprise</h1>
                    <p class="pt-2 tracking-wide">
                        <span class="text-gray-400 align-top">$ </span>
                        <span class="text-3xl font-semibold">35</span>
                        <span class="text-gray-400 font-medium">/ user</span>
                    </p>
                    <hr class="mt-4 border-1">
                    <div class="pt-8">
                        <p class="font-semibold text-gray-400 text-left">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                All features in <span class="text-black">Startup</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                Growth <span class="text-black">oriented</span>
                            </span>
                        </p>
                        <p class="font-semibold text-gray-400 text-left pt-5">
                            <span class="material-icons align-middle">
                                done
                            </span>
                            <span class="pl-2">
                                <span class="text-black">Unlimited</span> cloud storage
                            </span>
                        </p>

                        <a href="#" class="">
                            <p class="w-full py-4 bg-blue-600 mt-8 rounded-xl text-white">
                                <span class="font-medium">
                                    Choose Plan
                                </span>
                                <span class="pl-2 material-icons align-middle text-sm">
                                    east
                                </span>
                            </p>
                        </a>
                        <form  
                            class="w-full py-4 bg-blue-600 mt-8 rounded-xl text-white"
                            action="/create-checkout-session.php" method="POST">
                            @csrf
                            <input type="hidden" name="lookup_key" value="PP" />
                            <button class="pl-2 font-medium"
                                id="checkout-and-portal-button" 
                                type="submit">Choose Plan</button>
                            <span class="pl-2 material-icons align-middle text-sm">
                                east
                            </span>
                          </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    
{{-- </body>
</body>
</html> --}}

</x-app-layout>
