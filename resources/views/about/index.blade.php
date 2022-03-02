<x-app-layout>
    {{-- <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h1>
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
                        We develop ready to use custom branded web apps in just 14 days!
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

        
        

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="lg:text-center">
                {{-- <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2> --}}
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                  {{-- A better way to engage customers --}}
                  Intrested in having loyalty services under your brand ?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    {{-- Intrested in having your own loyalty services under your brand ?
                    cKlicky.com is a complete fully white labeled loyalty solution. --}}
                    cKlicky.com is a complete ready to use and white labeled loyalty solution. 
                    
                </p>
              </div>
          
              <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-500 text-white">
                        <!-- Heroicon name: outline/globe-alt -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Complete loyalty programs</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Offer product promotions and discounts. Reward and engage your customers with coupons, stamps and points.
                        
                    </dd>
                  </div>
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                        <!-- Heroicon name: outline/scale -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">White label solution</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        We completely rebrand the platform with your brand. Offer the soultion under your domain with your name and logo.
                    </dd>
                  </div>
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-purple-600 text-white">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">No app required </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        
                        With our web based loyalty solution you can deliver coupon, stamp and point campaings without a need to donwload the app by your customers.
                    </dd>
                  </div>

                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Easy to use </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        With our intuitive and easy to use admin panel you can setup custom branded loyalty campaings in minutes.
                    </dd>
                  </div>

                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-yellow-500 text-white">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> --}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg> --}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">User profiling and targeting </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Deliver campaigns to customers by their age, gender or interests. Schedule what times of each day your campaigns should be available.
                    </dd>
                  </div>
                  
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-pink-800 text-white">
                        <!-- Heroicon name: outline/annotation -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Account managment</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                      Create and manage your customer accounts with different priviliges. Set up campaigns for your clients or allow them to do that on their own.   </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>

          <div id="whitelabelsolution" 
            class="text-2xl sm:text-4xl text-center p-10 bg-gradient-to-b from-yellow-400 to-red-500 text-white">
            <h2 class="text-3xl pb-5">
                White label solution services
            </h2>
            <span class="font-extrabold block  py-1">
                We build a web app with admin panel with your branding. 
            </span>
            <span class="font-extrabold block  py-1">
                We take care of technology, development and new feature releases.
            </span>
            <span class="font-extrabold block  py-1">
                <br>
            </span>
            <span class="font-extrabold block  py-1">
                All this in just 14 days.
            </span>
        </div>

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="lg:text-center">
                {{-- <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2> --}}
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Rebranding is a simple and quick process   
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Our services are dedicated to business and non-profit oragnisations who are looking to 
                             offer loyalty solutions without app under their brand. <br>
                             We will guide you through the entire process
                
                    
                </p>
              </div>
            </div>
        </div>
        
        {{-- <div
            style="background-image: url('/images/layout/invitation-background.jpg')"
            class="text-center py-20">
            
            <h2 class="text-4xl text-white font-bold mb-2">
                White label solution - how it works
            </h2>
            <p class="m-auto w-4/5 text-gray-100 text-xl">
                Rebranding is a simple and quick process
            </p>
        
        </div> --}}
        
        {{-- <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#818CF8">
                  <path
                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                  ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                  <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path
                      d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                      opacity="0.100000001"
                    ></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg> --}}
        
        
                  
                <div class="py-12 bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                      {{-- <div class="lg:text-center ">
                        <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                          White label solution - how it works
                        </p>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                            Our services are dedicated to business and non-profit oragnisations who are looking to 
                             offer loyalty solutions without app under their brand.
                             Rebranding is a simple and quick process
                            
                        </p>
                      </div> --}}
        
                      
              
            
                  
                      <div class="mt-1">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center justify-center h-12 w-12 p-2 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/globe-alt -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg> --}}
                                1.
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Dedicated person</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                We designate a person to guide you during the rebranding process and answer all questions that come up. 
                                
                            </dd>
                            
                          </div>
        
                          
                  
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/scale -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg> --}}
                                2.
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Assets</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                We provide you a detailed list of assets required to proceed with the development.
                            </dd>
                          </div>
                          
                  
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/lightning-bolt -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg> --}}
                                3.
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Development</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                
                                Based on your requirements, our development team creates a customised CMS with your branding and at the domain you choose.
                            </dd>
                          </div>
        
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/lightning-bolt -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg> --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg> --}}
                                4.
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Testing</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                After your platform is ready, you have 14 days to test it thoroughly and provide us your feedback or requests for change.
                            </dd>
                          </div>
        
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center text-center justify-center h-12 w-12 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/lightning-bolt -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg> --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                  </svg> --}}
                                  {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                  </svg> --}}
                                  5.
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Hosting </p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Optionally you can decide on host the service on your servers.
                            </dd>
                          </div>
                          
                  
                          <div class="relative">
                            <dt>
                              <div class="absolute flex items-center justify-center h-12 w-12 rounded-xl bg-white text-green-500 font-extrabold text-5xl">
                                <!-- Heroicon name: outline/annotation -->
                                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                              </div>
                              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Go live</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                You are ready to go ! Create your first white labeled campaign.
                            </dd>
                          </div>
                        </dl>
                      </div>
                    </div>
                  </div>
        
        
                  
        

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="lg:text-center">
                {{-- <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2> --}}
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Loyalty Campaign Types    
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Full screen image, video, image and description content <br>
                        templates available for points, coupons and stamps.
                    
                    
                </p>
              </div>
            </div>
        </div>
        {{-- <div
        id="scrollContainer"
        class="flex flex-no-wrap items-center mb-8 mx-auto w-4/5"> --}}
          
            <div class="w-full sm:w-3/4 mx-auto items-stretch sm:space-x-16 mb-28">
              <div
                class="inline-flex w-full sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px  h-max-350px md:pb-4 border rounded-lg sm:ml-16">
                {{-- <a href="/points/" class=""> --}}
                    <div>
                    <div class="aspect-w-16 aspect-h-9">
                        <img
                            class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                            {{-- src="{{ asset('storage/images/layout/61b5e0076dd27-Test.jpg ') }}" --}}
                            src="{{ asset('storage/layout/loyalty-point-campaign.jpg ') }}"

                            alt=""
                        />
                    </div>
                    <div class="px-4 py-2 mt-2">
                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                            <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2">
                            Loyalty Points
                            </h3>
                        </div>
              
              

              <div class="text-md">
                  
                  <p class="text-sm md:text-lg mb-6 h-10 text-center">
                    Engage your customers with point campaign !            
                  </p>

                  <p class="text:lg my-4 text-center bg-yellow-300 text-gray-600 font-bold py-1 px-2 rounded-3xl">
                    Points collected: {{ $myPoint->points_amount ?? "3" }}/{{ $point->total_points ?? "15" }}                   
                  </p>
                  
                  
                  {{-- <p class="text-xl mb-1 text-center">
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      More details:                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1">
                  Available in: cKlicky.com platform                   
                  </p>
                  {{-- <p class="text-xs mb-1">
                    Available through: {{ $point->available_through ?? "No ava" }}                   
                    </p> --}}
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    Valid time: 1 Dec, 2021 - 31 Jan, 2022
                    
                    {{-- {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                   --}}
                  </p>
                  {{-- <p class="text-sm mb-1">
                    Time to complete all points: 31 Jan, 2022                
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  
                  
                  {{-- <span class="">
                  <a 
                      href="/points/{{ $point->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
                  </span>
                  
                  <span class="float-right">
                      <a 
                          href="/points/{{ $point->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span> --}}
                  

              

              {{-- @if($point->id == $myPoints->point_id)
                <span class="float-right">
                  <form 
                      action="/points/addtomy/{{ $point->id }}"
                      method="POST">
                      @csrf

                      <button 
                          class="text-green-500 pr-3"
                          type="submit">
                          Add to favourites
                      </button>

                  </form>
                </span>
              @else
              <span class="float-right">
                <form 
                    action="/points/addtomy/{{ $point->id }}"
                    method="POST">
                    @csrf

                    <button 
                        class="text-green-500 pr-3"
                        type="submit">
                        Add to favourites
                    </button>

                </form>
              </span>
              @endif --}}
              

              {{-- <span class="float-right">
                  <form 
                      action="/points/{{ $point->slug }}"
                      method="POST">
                      @csrf
                      @method('delete')

                      <button 
                          class="text-red-500 pr-3"
                          type="submit">
                          Delete
                      </button>

                  </form>
              </span> --}}
              {{-- <div class="w-4/5 mb-5 mx-auto border-b-2 border-gray-200">
                  <br>
              </div> --}}
              <div class="flex space-x-1 mb-1">
                <div class="flex-1 w=4/5 m-auto text-center">
                   
                        <button 
                            type="submit"
                            class="cursor-text bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add to My  <svg class="h-5 w-5 inline" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                            </svg>
                        </button>
                   
                </div>
    
                <div class="flex-1 w=4/5 m-auto text-center">
                    
                
                        <button 
                            type="submit"
                            class="cursor-text bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add points
                        </button>            
                    
                </div>
              </div>
              
              
        
              </div>

                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div> --}}
            </div>

          
         
            
          {{-- </a> --}}
      
        </div>
    </div>
      {{-- </a> --}}
      

      <div
          class="inline-flex w-full sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mx-auto md:pb-4 border rounded-lg self-stretch">
          {{-- <a href="/points/" class="  "> --}}
        <div>
          {{-- <a href="" class="space-y-2"> --}}
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/layout/loyalty-coupon-campaign.jpg') }}"
                alt=""
              />
            </div>

            

            <div class="px-4 py-2 mt-2">
              <div class="text-lg leading-6 font-medium space-y-1 text-center">
                <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2">
                  Loyalty Coupons
                </h3>
              </div>
              
              

              <div class="text-md">
                  
                  <p class="text-sm md:text-lg mb-6 h-10 text-center">
                      Encourage customers to visit your business !                   
                  </p>

                  <p class="text:lg my-4 text-center bg-yellow-300 text-gray-600 font-bold py-1 px-2 rounded-3xl">
                    Redeem                
                  </p>
                  
                  
                  {{-- <p class="text-xl mb-1 text-center">
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      More details:                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1">
                    Available in: cKlicky.com platform                   
                    </p>
                    {{-- <p class="text-xs mb-1">
                      Available through: {{ $point->available_through ?? "No ava" }}                   
                      </p> --}}
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                      Valid time: 1 Dec, 2021 - 31 Jan, 2022
                      
                      {{-- {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                   --}}
                    </p>
                  {{-- <p class="text-sm mb-1">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  
                  
                  {{-- <span class="">
                  <a 
                      href="/points/{{ $point->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
                  </span>
                  
                  <span class="float-right">
                      <a 
                          href="/points/{{ $point->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span> --}}
                  

              

              {{-- @if($point->id == $myPoints->point_id)
                <span class="float-right">
                  <form 
                      action="/points/addtomy/{{ $point->id }}"
                      method="POST">
                      @csrf

                      <button 
                          class="text-green-500 pr-3"
                          type="submit">
                          Add to favourites
                      </button>

                  </form>
                </span>
              @else
              <span class="float-right">
                <form 
                    action="/points/addtomy/{{ $point->id }}"
                    method="POST">
                    @csrf

                    <button 
                        class="text-green-500 pr-3"
                        type="submit">
                        Add to favourites
                    </button>

                </form>
              </span>
              @endif --}}
              

              {{-- <span class="float-right">
                  <form 
                      action="/points/{{ $point->slug }}"
                      method="POST">
                      @csrf
                      @method('delete')

                      <button 
                          class="text-red-500 pr-3"
                          type="submit">
                          Delete
                      </button>

                  </form>
              </span> --}}
              {{-- <div class="w-4/5 mb-5 mx-auto border-b-2 border-gray-200">
                  <br>
              </div> --}}
              <div class="flex space-x-1 mb-1">
                <div class="flex-1 w=4/5 m-auto text-center">
                    
                
                        <button 
                            type="submit"
                            class="cursor-text bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add to My  <svg class="h-5 w-5 inline" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                            </svg>
                        </button>
                   
                </div>
    
                <div class="flex-1 w=4/5 m-auto text-center">
                    
                
                        <button 
                            type="submit"
                            class=" cursor-text bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Redeem
                        </button>            
                    
                </div>
              </div>
              
              
        
              </div>

                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div> --}}
            </div>

          
         
            
          {{-- </a> --}}
      
        </div>
    </div>
      {{-- </a> --}}
      
      <div
          class="inline-flex w-full sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mx-auto md:pb-4 border rounded-lg">
          {{-- <a href="/points/" class=""> --}}
            <div class="">

          {{-- <a href="" class="space-y-2"> --}}
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/layout/loyalty-stamp-campaign.jpg ') }}"
                alt=""
              />
            </div>

            

            <div class="px-4 py-2 mt-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2 text-center">
                  Loyalty Stamps
                </h3>
              </div>
              
              

              <div class="text-md">
                  
                <p class="text-sm md:text-lg text-center mb-6 h-10">
                    Reward your customers for coming back !                   
                </p>
                
                @for ($i = 0; $i < 3; $i++)
                    <div class="inline-flex border-2 border-pink-500 rounded-full h-7 w-7 items-center justify-center text-pink-500 m-1">
                        <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                        </svg>
                    </div>
                @endfor

                @for ($i = 0; $i < 2; $i++)
                    <div class="inline-flex border-2 border-gray-300 rounded-full h-7 w-7 items-center justify-center text-transparent m-1">
                        <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                        </svg>
                    </div>
                @endfor
            
                  
                  {{-- <p class="text-xl mb-1 text-center">
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      More details:                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1 mt-3">
                    Available in: cKlicky.com platform                   
                    </p>
                    {{-- <p class="text-xs mb-1">
                      Available through: {{ $point->available_through ?? "No ava" }}                   
                      </p> --}}
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                      Valid time: 1 Dec, 2021 - 31 Jan, 2022
                      
                      {{-- {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                   --}}
                    </p>
                  {{-- <p class="text-sm mb-1">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  
                  
                  {{-- <span class="">
                  <a 
                      href="/points/{{ $point->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
                  </span>
                  
                  <span class="float-right">
                      <a 
                          href="/points/{{ $point->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span> --}}
                  

              

              {{-- @if($point->id == $myPoints->point_id)
                <span class="float-right">
                  <form 
                      action="/points/addtomy/{{ $point->id }}"
                      method="POST">
                      @csrf

                      <button 
                          class="text-green-500 pr-3"
                          type="submit">
                          Add to favourites
                      </button>

                  </form>
                </span>
              @else
              <span class="float-right">
                <form 
                    action="/points/addtomy/{{ $point->id }}"
                    method="POST">
                    @csrf

                    <button 
                        class="text-green-500 pr-3"
                        type="submit">
                        Add to favourites
                    </button>

                </form>
              </span>
              @endif --}}
              

              {{-- <span class="float-right">
                  <form 
                      action="/points/{{ $point->slug }}"
                      method="POST">
                      @csrf
                      @method('delete')

                      <button 
                          class="text-red-500 pr-3"
                          type="submit">
                          Delete
                      </button>

                  </form>
              </span> --}}
              {{-- <div class="w-4/5 mb-5 mx-auto border-b-2 border-gray-200">
                  <br>
              </div> --}}
              <div class="flex space-x-1 mb-1">
                <div class="flex-1 w=4/5 m-auto text-center">
                    
                
                        <button 
                            type="submit"
                            class="cursor-text bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add to My  <svg class="h-5 w-5 inline" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                            </svg>
                            
                        </button>
                    
                </div>
    
                <div class="flex-1 w=4/5 m-auto text-center">
                   
                
                        <button 
                            type="submit"
                            class="cursor-text bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Stamp Me
                        </button>            
                    
                </div>
              </div>
              
              
        
              </div>

                 
            </div>
        {{-- </a> --}}
    </div>
        {{-- </div> --}}
      
    


    </div>

    
</div>

{{-- <div class="relative">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-2.000000, 44.000000)" fill="#f8fafc" fill-rule="nonzero">
          <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
          <path
            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
            opacity="0.100000001"
          ></path>
          <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
        </g>
        <g transform="translate(-4.000000, 76.000000)" fill="#818CF8" fill-rule="nonzero">
          <path
            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
          ></path>
        </g>
      </g>
    </svg>
  </div> --}}

  
        
        {{-- <div class="text-center py-10 bg-gray-100">
            <h2 class="text-4xl font-bold">
                Rebranding is a simple and quick process
            </h2>
            <p class="m-auto w-4/5 text-gray-700">
                Just send us your logo and domain details and we will take care of the rest
            </p>
    
        </div> --}}
        {{-- <div class="sm:grid grid-cols-2 w-4/5 m-auto  pt-10">
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
                   
                </div>
            </div>
            <div class="">
                <img 
                    src="{{ asset('storage/layout/white-label-solution.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl"
                    >
            </div>
    
        </div> --}}

        {{-- <div class="text-center p-10 bg-gradient-to-b from-yellow-400 to-red-500 text-white">
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
        </div> --}}
        
        {{-- <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#EF4444">
                  <path
                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                  ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                  <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path
                      d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                      opacity="0.100000001"
                    ></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg> --}}
    

        {{-- <div class="sm:grid grid-cols-2 gap-20 w-4/5 mb-10 mx-auto py-1">
            <div>
                <img 
                    src="{{ asset('storage/layout/without-app-coupons.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl mb-4 mt-12"
                    >
            </div>
            
            <div class="m-auto w-full sm:w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Your clients are tiered of constantly downloding new apps ?
                </h2>
                <p class="py-5 text-gray-500 text-s">
                    With our web based loyalty solution you can deliver coupon, stamp & point campaings without a need to donwload the app by your customers. 
                </p>
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    We completely rebrand the platform with your brand. 
                </p>
                <div class="text-center">
                    <a 
                        class="bg-green-500 text-white text-s font-extrabold py-1 px-3 rounded-3xl w-screen"
                        href="/login">
                        Try cKlicky.com for free !
                    </a>
                </div>
            </div>
        </div> --}}

        {{-- <div class="relative -mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#4F46E5" fill-rule="nonzero">
                  <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                  <path
                    d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                    opacity="0.100000001"
                  ></path>
                  <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#4F46E5" fill-rule="nonzero">
                  <path
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                  ></path>
                </g>
              </g>
            </svg>
          </div> --}}

        <div class="text-center py-20 bg-gradient-to-r from-pink-500 to-indigo-600 text-white ">
            <h2 class="text-4xl font-bold mb-2">
                Loyalty campaigns without the app - how it works
            </h2>
            <p class="m-auto w-4/5  text-xl text-white">
                Coupons, stamps & points campaigns work based on qr code technology <br>
                without need to downloading the app 
            </p>
        </div>

        {{-- <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#EC4899">
                  <path
                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                  ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                  <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path
                      d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                      opacity="0.100000001"
                    ></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg> --}}

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="lg:text-center">
                {{-- <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2> --}}
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Your clients are tiered of constantly downloding new apps ?   
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Downloading app is often discouraging from joining the loyalty programs. <br> 
                    That is why we have created loyalties without the need to use the app. <br>
                    Simple and quick to use.
                             
                
                    
                </p>
              </div>
            </div>
        </div>

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              {{-- <div class="lg:text-center ">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                  White label solution - how it works
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Our services are dedicated to business and non-profit oragnisations who are looking to 
                     offer loyalty solutions without app under their brand.
                     Rebranding is a simple and quick process
                    
                </p>
              </div> --}}

              
      
    
          
              <div class="mt-6 mb-16">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/globe-alt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Create user account</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Create an account and you are ready to go !                        
                    </dd>
                  </div>
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/scale -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Browse campaigns</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Browse venues, categories and loyalty campaigns available on the webpage.
                    </dd>
                  </div>
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Favourite offers</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Choose your favourite venues, categories and loyalty campaigns.
                    </dd>
                  </div>

                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> --}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Collect points by one cklick</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Collect points and redeem coupons by showing the campaign to seller. Seller will redeem coupon or add points by scanning campaign qr code.                  </div>

                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/lightning-bolt -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> --}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg> --}}
                          {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                          </svg> --}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Points and stamps reward </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Get your reward after collecting the appropriate number of points.
                    </dd>
                  </div>
                  
          
                  <div class="relative">
                    <dt>
                      <div class="absolute flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white font-extrabold text-2xl">
                        <!-- Heroicon name: outline/annotation -->
                        {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                          </svg>
                      </div>
                      <p class="ml-16 text-lg leading-6 font-medium text-gray-900">All this without app</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        All this without need to downloading the app. Just scan qrcode.
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>



        {{-- <div class="sm:grid grid-cols-2 w-4/5 m-auto pb-6 pt-10">
            <div class="flex bg-white-700 text-gray-700 pt-15">
                <div class="m-auto pb-16 pt-6 sm:m-auto w-4/5 block font-sans">
                    <span class="text-s block pb-1">
                        1. Create an account and you are ready to go ! 
                    </span>
                    <span class="text-s block pb-1">
                        2. Browse venues, categories and loyalty campaigns available on the webpage.
                    </span>
                    <span class="text-s block pb-1">
                        3. Choose your favourite venues, categories and loyalty campaigns.
                    </span>
                    <span class="text-s block pb-1">
                        4. Receive the special offers dedicated to you by mail.
                    </span>
                    <span class="text-s block pb-1">
                        5. Collect points and redeem coupons by showing the campaign to seller. Seller will redeem coupon or add points by just one click.  
                    </span>
                    <span class="text-s block pb-1">
                        6. Get your reward after collecting the appropriate number of points.
                    </span>
                    <span class="text-s block pb-1">
                        7. All this without need to downloading the app.
                    </span>
                    
                </div>
            </div>
            <div>
                <img 
                    src="{{ asset('storage/layout/rebranding-loyalty-coupons-lp.jpg') }}" 
                    width="700" 
                    alt=""
                    class="rounded-xl"
                    >
            </div>
    
        </div>
        <div class="text-center py-16 bg-white">
            <div class="text-center items-center">
                <a 
                class="bg-blue-500 text-white text-s font-extrabold py-3 px-3 rounded-3xl ml-3"
                href="/login">
                Just try it now !
            </a>
            </div>
        </div> --}}

        {{-- <div class="bg-gray-50 mt-20">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
              <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to dive in?</span>
                <span class="block text-blue-600">Start your free trial today.</span>
              </h2>
              <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                  <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Get started
                  </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                  <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                    Learn more
                  </a>
                </div>
              </div>
            </div>
          </div> --}}
      


  
    {{-- <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#f8fafc">
              <path
                d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
              ></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
              <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                <path
                  d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                  opacity="0.100000001"
                ></path>
                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
              </g>
            </g>
          </g>
        </g>
      </svg> --}}
  


{{-- <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
        <g class="wave" fill="#f8fafc">
          <path
            d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
          ></path>
        </g>
        <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
          <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
          </g>
        </g>
      </g>
    </g>
  </svg> --}}

  <div class="relative -mt-12 lg:-mt-24">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-2.000000, 44.000000)" fill="#FBBF24" fill-rule="nonzero">
          <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
          <path
            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
            opacity="0.100000001"
          ></path>
          <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
        </g>
        <g transform="translate(-4.000000, 76.000000)" fill="#FBBF24" fill-rule="nonzero">
          <path
            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
          ></path>
        </g>
      </g>
    </svg>
  </div>

<div class="bg-gradient-to-b from-yellow-400 to-red-500 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
      <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        <span class="block">Ready to dive in?</span>
        <span class="block text-blue-600">Start your free trial today.</span>
      </h2>
      <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
        <div class="inline-flex rounded-md shadow">
          <a href="/login" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
            Get started
          </a>
        </div>
        <div class="ml-3 inline-flex rounded-md shadow">
          <a href="/loyalties" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
            Learn more
          </a>
        </div>
      </div>
    </div>
  </div>

  
 
  
  
</x-app-layout>