<footer class="bg-gray-800 py-20 ">
    <div class="sm:grid grid-cols-3 w-4/5 pb-10 m-auto border-b-2 border-gray-700">
        
        <div>
            <h3 class="text-l sm:font-bold text-gray-100">
                cKlicky.com Sp. z o.o.
            </h3>

            <ul class="py-4 sm:text-s pt-4 text-gray-400">
                
                <li class="pb-1">
                    <a href="https://www.google.pl/maps/place/Włoska+8,+30-638+Kraków/@50.0176854,19.9679114,17z/data=!3m1!4b1!4m5!3m4!1s0x4716434ff7782e95:0x93f0d1ff0d56b94f!8m2!3d50.017682!4d19.9701001">
                        
                        Radzikowskiego 61d/5 <br>
                        31-315 Kraków <br>
                        Poland, Europeen Union
                    </a>
                </li>
                {{-- <li class="pb-1">
                    <a href="/">
                        Phone
                    </a>
                </li> --}}
                <li class="pb-1">
                    <a href="/">
                        mail: hi@cklicky.com
                    </a>
                </li>

            </ul>
        </div>
        <div>
            <h3 class="text-l sm:font-bold text-gray-100">
                White label solution services
            </h3>

            <ul class="py-4 sm:text-s pt-4 text-gray-400">
                <li class="pb-1">
                    <a href="/about/#whitelabelsolution">
                        White label solution
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/loyalty">
                        Loyalty programs
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/loyalty">
                        Coupons
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/loyalty">
                        Points
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/loyalty">
                        Stamps
                    </a>
                </li>

            </ul>
        </div>
        <div>
            <h3 class="text-l sm:font-bold text-gray-100">
                Pages
            </h3>

            <ul class="py-4 sm:text-s pt-4 text-gray-400">
                <li class="pb-1">
                    <a href="/about">
                        About
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/dashboard">
                        Dashboard
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/loyalty">
                        Promotions
                    </a>
                </li>
                @auth
                <li class="pb-1">
                    <a href="/myloyalties/{{auth()->user()->id}} ">
                        My offers
                    </a>
                </li>
                @endauth
                <li class="pb-1">
                    <a href="/login">
                        Login
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/register">
                        Register
                    </a>
                </li>

            </ul>
        </div>

        

        
    </div>
    <div class="w-full mx-auto">
        <p class="w-4/5 pb-3 mx-auto text-xs text-gray-100 pt-6">
            Copyright 2021 
                <a class=" ml-6 " href="/privacy-policy">Privacy Policy</a>
                <a class=" ml-6 " href="/terms-of-service">Terms of Service</a>
        </p>
    </div>
    
    
</footer>