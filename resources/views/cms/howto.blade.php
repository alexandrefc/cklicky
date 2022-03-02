<x-app-layout>




    

        {{-- <article id="the-article"> --}}
    
    <div>
        <div class="mx-auto max-w-6xl">
            <div class="p-2 rounded">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3 p-4 text-sm">
    
                        <div class="sticky inset-x-0 top-0 left-0 py-12">
                    
                            <div class="text-3xl text-green-500 font-extrabold mb-8">cKlicky.com Help Center</div>
                            <div class="mb-2">Have questions ?</div>
                            <div class="text-xs text-gray-600">See our FAQ for more details</div>
        
                            {{-- <div class="relative text-gray-600 mt-8 lg:mr-16">
                                <input 
                                x-ref="searchField"
                                x-model="search"
                                x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                                type="search" name="serch" placeholder="Search" class="bg-white w-full h-10 px-5 rounded-full text-sm focus:outline-none">
                                <button type="submit" class="focus:outline-none absolute right-0 top-0 mt-3 mr-4">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                </svg>
                                </button>
                            </div> --}}
    
                        </div>
                    </div>
                    
                    <div class="md:w-2/3 py-10">
                        <div class="p-4 ">
                            <h2 class="text-green-500 font-bold text-xl">Testing cklicky.com services</h2>
    
                <div class="item px-6 py-3 border-b-2 border-blue-100 " x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 class="" :class="{'text-green-600 font-extrabold' : isOpen == true}">Testing cklicky.com services</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="">
                            Please note that free trail and demo account is dedicated only to our new potential partners for testing purposes.
                            cKlicky.com does not provide loyalty solutions under our brand, we cooperate only based on the white label solution.
                            Not all data and features are available in demo account. 
                            During the trail you will be able to see and interact with campaigns created only by you.<br><br>
                            
                            For better experience during the tests please use google Chrome browser. <br> <br>
                            
                            <a class="text-green-600 font-extrabold" href="{{ route('register') }}">-> Create cklicky.com account.</a> <br>
                        </p>
                        <p class="text-xs md:text-sm">
                            2. During the registration process please add "User test account email". <br>
                            {{-- 3. Log in using your main/admin account credentials.<br> --}}
                            3. Create venues and categories (available only with white label solution) <a class="text-green-600 font-extrabold" href="{{ route('dashboard') }}">-></a> <br>
                            4. Create loyalty campaigns: Points, Coupons & Stamps <a class="text-green-600 font-extrabold" href="{{ route('dashboard') }}">-></a> <br>                            
                            5. Create another account (User account) using "User test account email" as an email. <br>
                            IMPORTANT: This account must match User test account email specified when creating the main account. <br>
                            6. Log in using your user account credentials (user test account email). <br>
                            7. Now you can browse the offers, add to favourites and see the user experience. <br>
                            8. Please follow the below guides how to add points & stamps or redeem coupon.
                        </p>
                            
                    </div>
                </div>

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Create, edit and delete venue</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="mb-2">
                            To create a venue go to <a class="text-blue-700" href="/venues">Venues Create & Edit</a> and click <a class="text-blue-700" href="/stamps/create">+ Create new venue</a> 
                        </p>
                        <p class="">
                            Fill in all mandatory and preferred optional inputs: 
                            <div class="">
                                <p class="ml-16">
                                    <span class="font-extrabold">Add Company logo</span> - mandatory. Upload your logo.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Company name</span> - mandatory. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Company Email</span> - optional.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Company Website</span> - optional.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Company Address</span> - optional.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Category</span> - optional. Category of the venue. Set All to make it available for all categories.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Description</span> - optional. Addtional description of company.
                                </p>
                                
                            </div>
                        </p>
                        <p class="mt-3">
                            To edit a venue go to <a class="text-blue-700" href="/venues">Venues Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Edit</a>
                        </p>
                        <p class="underline mt-3">
                            Important note: venue deletion is irreversible.
                        </p>
                        <p>
                            To delete a venue go to <a class="text-blue-700" href="/venues">Venues Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Delete</a>
                        </p>
                        
                    </div>
                </div>

                

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Create, edit and delete coupon campaign</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="mb-2">
                            To create a coupon campaign go to <a class="text-blue-700" href="/coupons">Coupons Create & Edit</a> and click <a class="text-blue-700" href="/coupons/create">+ Create New Coupon</a> 
                        </p>
                        <p class="">
                            Fill in all mandatory and preferred optional inputs: 
                            <div class="">
                                <p class="ml-16">
                                    <span class="font-extrabold">Title</span> - mandatory. Pick a Name for your Campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Description</span> - optional. Addtional description of the campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Image</span> - mandatory. The main image of your campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Full Screen Image</span> - optional. Upload when you'd like to show the camapaign as full screen image.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">YouTube video embed id</span>YouTube video embed id - optional. If you'd like to show video content of the campaign. 
                                    Go to your YouTube video -> cklick "Share" -> cklcik "embed" and fill in only the last signs.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Manager email</span> - mandatory. Only manager can add points & stamps and redeem coupons.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Category</span> - optional. Category of your campaign. Set All to make it available for all categories.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Start & End Date</span> - optional. The dates between the camapign stays valid. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Valid by for user</span> - optional. The time user has to redeem coupon - starts when campaign has been added to favourites. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Award reset time</span> - optional. Time the user has to wait to redeem coupon again.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Age rules</span> - optional. Campaign dedicated to speficic age group. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Gender rules</span> - optional. Campaign dedicated to speficic gender. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Schedule rules:</span> - optional. Campaign will be visible only then. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Available through</span>Available through - mandatory. Campaign will be visible on webpage or only when sent by mail.
                                    Can be also set as a reward.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Base Venue</span> - mandatory. venue where campaign is available.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Reward</span> - optional. Reward will be added to favourites automatically when user redeem the coupon. 
                                </p>
                            </div>
                                
                        </p>
                        <p class="mt-3">
                            To edit a coupon campaign go to <a class="text-blue-700" href="/coupons">Coupons Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Edit</a>
                        </p>
                        <p class="underline mt-3">
                            Important note: campaign deletion is irreversible.
                        </p>
                        <p>
                            To delete a coupon campaign go to <a class="text-blue-700" href="/coupons">Coupons Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Delete</a>
                        </p>
                        
                    </div>
                </div>
                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Create, edit and delete point campaign</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="mb-2">
                            To create a coupon campaign go to <a class="text-blue-700" href="/points">Points Create & Edit</a> and click <a class="text-blue-700" href="/points/create">+ Create New Point</a> 
                        </p>
                        <p class="">
                            Fill in all mandatory and preferred optional inputs: 
                            <div class="">
                                <p class="ml-16">
                                    <span class="font-extrabold">Title</span> - mandatory. Pick a Name for your Campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Description</span> - optional. Addtional description of the campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Image</span> - mandatory. The main image of your campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Full Screen Image</span> - optional. Upload when you'd like to show the camapaign as full screen image.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">YouTube video embed id</span>YouTube video embed id - optional. If you'd like to show video content of the campaign. 
                                    Go to your YouTube video -> cklick "Share" -> cklcik "embed" and fill in only the last signs.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Manager email</span> - mandatory. Only manager can add points & stamps and redeem coupons.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Category</span> - optional. Category of your campaign. Set All to make it available for all categories.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Start & End Date</span> - optional. The dates between the camapign stays valid. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Award points</span> - mandatory. The number of points should be added by each scan. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Total points</span> - optional. The number of total points after collecting which the campaign is over and reward can be collected. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Valid by for user</span> - optional. The time user has to collect all points - starts when campaign has been added to favourites. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Award reset time</span> - optional. Time the user has to wait to collect points again.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Age rules</span> - optional. Campaign dedicated to speficic age group. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Gender rules</span> - optional. Campaign dedicated to speficic gender. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Schedule rules:</span> - optional. Campaign will be visible only then. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Available through</span>Available through - mandatory. Campaign will be visible on webpage or only when sent by mail.
                                    Can be also set as a reward.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Base Venue</span> - mandatory. venue where campaign is available.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Reward</span> - optional. Reward will be added to favourites automatically when user collect all points. 
                                </p>
                            </div>
                                
                                
                        </p>
                        <p class="mt-3">
                            To edit a point campaign go to <a class="text-blue-700" href="/points">Points Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Edit</a>
                        </p>
                        <p class="underline mt-3">
                            Important note: campaign deletion is irreversible.
                        </p>
                        <p>
                            To delete a point campaign go to <a class="text-blue-700" href="/points">Points Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Delete</a>
                        </p>
                        
                    </div>
                </div>
                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Create, edit and delete stamp campaign</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="mb-2">
                            To create a stamp campaign go to <a class="text-blue-700" href="/stamps">Stamps Create & Edit</a> and click <a class="text-blue-700" href="/stamps/create">+ Create New Stamp</a> 
                        </p>
                        <p class="">
                            Fill in all mandatory and preferred optional inputs: 
                            <div class="">
                                <p class="ml-16">
                                    <span class="font-extrabold">Title</span> - mandatory. Pick a Name for your Campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Description</span> - optional. Addtional description of the campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Image</span> - mandatory. The main image of your campaign.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Upload Full Screen Image</span> - optional. Upload when you'd like to show the camapaign as full screen image.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">YouTube video embed id</span>YouTube video embed id - optional. If you'd like to show video content of the campaign. 
                                    Go to your YouTube video -> cklick "Share" -> cklcik "embed" and fill in only the last signs.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Manager email</span> - mandatory. Only manager can add points & stamps and redeem coupons.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Category</span> - optional. Category of your campaign. Set All to make it available for all categories.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Start & End Date</span> - optional. The dates between the camapign stays valid. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Award stamps</span> - mandatory. The number of stamps should be added by each scan. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Total stamps</span> - optional. The number of total stamps after collecting which the campaign is over and reward can be collected. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Valid by for user</span> - optional. The time user has to collect all stamps - starts when campaign has been added to favourites. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Award reset time</span> - optional. Time the user has to wait to add stamps again.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Age rules</span> - optional. Campaign dedicated to speficic age group. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Gender rules</span> - optional. Campaign dedicated to speficic gender. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Schedule rules:</span> - optional. Campaign will be visible only then. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Available through</span>Available through - mandatory. Campaign will be visible on webpage or only when sent by mail.
                                    Can be also set as a reward.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Base Venue</span> - mandatory. venue where campaign is available.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Reward</span> - optional. Reward will be added to favourites automatically when user collect all stamps. 
                                </p>
                            </div>
                        </p>
                        <p class="mt-3">
                            To edit a stamp campaign go to <a class="text-blue-700" href="/stamps">Stamps Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Edit</a>
                        </p>
                        <p class="underline mt-3">
                            Important note: campaign deletion is irreversible.
                        </p>
                        <p>
                            To delete a stamp campaign go to <a class="text-blue-700" href="/stamps">Stamps Create & Edit</a> and click on the bottom <a class="text-blue-700" href="">Delete</a>
                        </p>
                        
                    </div>
                </div>
                

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Adding points & stamps and redeem coupons</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        <p class="">
                            1. Points & stamps can be added or coupons redeemed only by admin or manager of the campaign.
                        </p>
                        <p class="mt-3">
                            2. During the tests log in using user account and open the redeem or add points page by clicking "Redeem", "Add points" or "Stamp me" buttons on the campaign template. 
                        </p>
                        <p class="mt-3">
                            3. On other device log in with manager or admin email account and scan qr code. 
                        </p>
                        <p class="mt-3">
                            4. No additional apps are reqiured. You can scan qr code using your phone default browser or camera scanner. 
                        </p>
                    </div>
                </div>

                <h2 class="text-green-500 font-bold text-xl mt-6">White label solution services</h2>

                

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Starting with white label solution</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        {{-- <p class="mb-2">
                            Important note: campaign deletion is irreversible. 
                        </p> --}}
                        <p class="mb-2">
                            Please note that before proceeding with white label solution you should test the platform thoroughly taking advantage of our free trail and demo account. <br> <br>
                            To proceed with your white label project go to User Profile <a class="text-blue-700" href="/user/profile#billing">Billing Information</a> 
                            
                        </p>
                        <p class="text-xs md:text-sm">
                            1. Update your billing data - this data will be used on finance documents and invoices: 
                            <div class="text-xs md:text-sm">
                                <p class="ml-16">
                                    <span class="font-extrabold">Company name</span> - mandatory.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Tax Id</span> - manadatory for EU companies. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Country</span> - mandatory.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">State / Province</span> - optional. 
                                </p>
                                
                                <p class="ml-16">
                                    <span class="font-extrabold">Street</span> - mandatory. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">City</span> - mandatory. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">ZIP / Postal code</span> - optional.  
                                </p>

                            </div>
                        </p>
                        <p class="mt-3 text-xs md:text-sm">
                            2. Go to located below section: Go white label ! and cklick <span class="text-blue-700">Subscribe for white label plan</span>.
                        </p>
                        <p class="text-xs md:text-sm">
                            3. On Pricing page click <span class="text-blue-700">Subscribe</span> button on the bottom of the plan description. 
                        </p>
                        <p class="text-xs md:text-sm">
                            4. You will be redirected to Stripe gateway where you can securely pay for subscription.
                        </p>
                        <p class="text-xs md:text-sm">
                            5. Our dedicated for your project dev team member who will coordinate the rebranding process will contact you asap.
                        </p>
                        
                    </div>
                </div>

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Preparing assets & development stage</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        {{-- <p class="mb-2">
                            Important note: campaign deletion is irreversible. 
                        </p> --}}
                        <p class="mb-2">
                            We will provide a detailed list of assets we need from you to proceed with the development. <br>
                        
                            
                        </p>
                        <p class="">
                            1. Please find below the list of assets we need to start working on your project: 
                            <div class="text-xs md:text-sm">
                                <p class="ml-16">
                                    <span class="font-extrabold">Name </span>of the app.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Logo </span>of the app. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Favicon</span> of the website.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">From email </span>- email used to send emails to your customers. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Support email</span> - email used to receive support issues from your customers.  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Admin account</span> - which account should we set as your admin account?  
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Timezone</span> - what is default timezone for your app users (UTC +/-)? 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Privacy policy </span> URL. 
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">Terms of use</span> URL.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold"> Domain name </span> where the service should be directed, for example yourcompanyname.com. 
                                    Once you have the domain ready, please create a redirect in record A to our IP. 
                                    If you prefere we offer domain & SSL certificate service for €250 yearly.
                                </p>
                                <p class="ml-16">
                                    <span class="font-extrabold">SSL certificate</span> for the domain (We need 3 separate .txt files named: 
                                    SSL.txt, PrivateKey.txt and CARootCert.txt. To obtain SSL you need to create a CSR (certificate signing request) for Apache server. 
                                    If you prefere we offer domain & SSL certificate service for €250 yearly.
                                </p>
                            </div>
                        </p>
                        <p class="mt-3 text-xs md:text-sm">
                            2. The development time usually takes 10-14 working days, then we will enable the link with ready to use service for testing.
                        </p>
                        <p class="mt-3 text-xs md:text-sm">
                            3. We offer up to 14 days free of charge testing/learnig period. Then the standard paid period begins with an auto-renewable monthly subscription.
                        </p>
                        
                    </div>
                </div>

                <div class="item px-6 py-3 border-b-2 border-blue-100" x-data="{isOpen : false}">
                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                        <h4 :class="{'text-green-600 font-extrabold' : isOpen == true}">Updates and new features releases</h4>
                        <svg 
                        :class="{'transform rotate-180' : isOpen == true}"
                        class="w-5 h-5 text-gray-500"
                            fill="none" stroke-linecap="round" 
                            stroke-linejoin="round" stroke-width="2" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3 mb-6 text-xs md:text-sm" :class="{'text-gray-600' : isOpen == true}">
                        
                        <p class="mb-2">
                            The platform is constantly being improved.
                            We are adding new features and functionalities, errors are corrected. <br>
                        </p>
                        <p class="mb-2">
                            Updates are available to our partners and are voluntary. <br>
                        </p>
                        <p class="mb-2">
                            One-time fee for each update is €250 <br>
                        </p>
                        
                    </div>
                </div>
 
                
            </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- </article> --}}
{{--     
    <div
        x-data="scrollHandler(document.getElementById('the-article'))"
        x-cloak
        aria-hidden="true"
        @scroll.window="calculateHeight(window.scrollY)"
        class="fixed h-screen w-1 hover:bg-gray-200 top-0 left-0 bg-gray-300">
        <div :style="`max-height:${height}%`" class="h-full bg-green-400"></div>
    </div>
    
    <div
        id="alpine-devtools"
        x-data="devtools()"
        x-show="alpines.length"
        x-init="start()">
    </div> --}}
    {{-- <script>
    function scrollHandler(element = null) {
        return {
            height: 0,
            element: element,
            calculateHeight(position) {
                const distanceFromTop = this.element.offsetTop
                const contentHeight = this.element.clientHeight
                const visibleContent = contentHeight - window.innerHeight
                const start = Math.max(0, position - distanceFromTop)
                const percent = (start / visibleContent) * 100;
                requestAnimationFrame(() => {
                    this.height = percent;
                });
            },
            init() {
                this.element = this.element || document.body;
                this.calculateHeight(window.scrollY);
            }
        };
    }
    
    </script>
     --}}




















</x-app-layout>