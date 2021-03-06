<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}
    

    {{-- <div> --}}
        
        <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
            
            <div @click="sidebarOpen = true" class="lg:hidden text-green-700 font-extrabold text-xl bg-gray-200 w-1/12"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform  bg-gradient-to-b from-green-700 to-green-300 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        {{-- <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"></path>
                        </svg> --}}
                        
                        <span class="text-white font-extrabold text-2xl">Dashboard</span>
                    </div>
                </div>
        
                <nav class="mt-10">
                    <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-white font-bold" href="/dashboard">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
        
                        <span class="mx-3">Loyalty campaigns</span>
                    </a>
        
                    <a class="flex items-center mt-4 py-2 px-6 text-white font-bold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/categories/create">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>
        
                        <span class="mx-3">Categories</span>
                    </a>
        
                    <a class="flex items-center mt-4 py-2 px-6 text-white font-bold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/app-users">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
        
                        <span class="mx-3">App users</span>
                    </a>
        
                    <a class="flex items-center mt-4 py-2 px-6 text-white font-bold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/faq">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
        
                        <span class="mx-3">How to's</span>
                    </a>
                </nav>
            </div>
            {{-- <div class="flex-1 flex flex-col overflow-hidden"> --}}
 
                <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8 w-4/5">
                        <h3 class="text-gray-700 text-center text-3xl font-medium mb-8">Create your campaigns</h3>
        
                        <div class="mt-4">
                            <div class="flex flex-wrap -mx-6">

                                <div class="w-full px-6 md:w-1/2 xl:w-1/2 mb-16">
                                    <a href="/categories/create">
                                    <div class="flex items-center px-5 py-6 shadow-lg hover:shadow-xl rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                  </svg>
                                        </div>
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">1. STEP</h4>
                                            <div class="text-gray-500 ">Create & Edit Categories</div>
                                        </div>
                                    </div>
                                </a>
                                </div>

                                <div class="w-full px-6 md:w-1/2 xl:w-1/2 mb-16">
                                    <a href="/venues">
                                    <div class="flex items-center px-5 py-6 shadow-lg hover:shadow-xl rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                  </svg>
                                        </div>
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">2. STEP</h4>
                                            <div class="text-gray-500 ">Create & Edit Venue</div>
                                        </div>
                                    </div>
                                </a>
                                </div>




                                {{-- <div class="w-full px-32 sm:w-1/2 xl:w-4/5 mx-auto mb-8">
                                    <a class=" cursor-text "
                                        href="/points">
                                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                              </svg>
                                        </div>
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">3. STEP</h4>
                                            <div class="text-gray-500 ">Create Points, Coupons & Stamps</div>
                                        </div>
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                              </svg>
                                        </div>
                                    </div>
                                </a>
                                </div> --}}

                                <div class="w-full px-6 md:w-1/2 xl:w-1/3 mb-16">
                                    <a href="/points">
                                    <div class="flex items-center px-5 py-6 shadow-lg hover:shadow-xl rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>
        
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">Points</h4>
                                            <div class="text-gray-500 ">Create & Edit</div>
                                        </div>
                                    </div>
                                </a>
                                </div>

                                <div class="w-full px-6 md:w-1/2 xl:w-1/3 mb-16">
                                    <a href="/coupons">
                                    <div class="flex items-center px-5 py-6 shadow-lg hover:shadow-xl rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>
        
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">Coupons</h4>
                                            <div class="text-gray-500 ">Create & Edit</div>
                                        </div>
                                    </div>
                                </a>
                                </div>




                                <div class="w-full px-6 md:w-1/2 xl:w-1/3 mb-16">
                                    <a href="/stamps">
                                    <div class="flex items-center px-5 py-6 shadow-lg hover:shadow-xl rounded-md bg-white">
                                        <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                            <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                                <path
                                                    d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                    stroke="currentColor" stroke-width="2"></path>
                                            </svg>
                                        </div>
        
                                        
                                        <div class="mx-auto text-center">
                                            <h4 class="text-2xl font-semibold text-gray-700">Stamps</h4>
                                            <div class="text-gray-500 ">Create & Edit</div>
                                        </div>
                                    </div>
                                </a>
                                </div>
        
                                
        
                                
                            </div>
                        </div>
        
                        <div class="mt-8">
        
                        </div>
        
                        <div class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    {{-- </div> --}}

</x-app-layout>
