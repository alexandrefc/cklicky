<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}


    {{-- <div> --}}
        
        <div x-data="{ sidebarOpen: true }" class="flex bg-gray-200">
            
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
                    <a class="flex items-center mt-4 py-2 px-6  text-white font-bold hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/dashboard">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
        
                        <span class="mx-3">Loyalty campaigns</span>
                    </a>
        
                    <a class="flex items-center mt-4 py-2 px-6 text-white font-bold bg-gray-700 bg-opacity-25"
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
                        <h3 class="text-gray-700 text-center text-3xl font-medium mb-8">Manage your categories</h3>
        
                        <div class="flex h-full bg-gray-100 items-center justify-center  pt-16 pb-32">
                            <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                              <div class="flex justify-center py-4">
                                <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                                  <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                </div>
                              </div>
                    
                              <div class="flex justify-center">
                                <div class="flex">
                                  <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Create category</h1>
                                </div>
                              </div>
                              
                              <div class="grid grid-cols-1 mt-5 mx-7 mb-5">
                                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Current Categories</label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                      @foreach ($categories as $category)
                                        <div class="grid grid-cols-1 border-b  border-purple-300 mb-2">
                                            {{ $category->name }}
                                        </div>
                                        @if(Gate::allows('wls_only', auth()->user()))
                                        <div class="grid grid-cols-1 mb-2 justify-items-end">
                                            <div>
                                              <form 
                                                action="/categories/{{ $category->id }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                          
                                                <button 
                                                    type="submit"
                                                    class=" bg-red-500 text-gray-100 text-xs font-extrabold py-1 px-3 rounded-3xl">
                                                    Delete
                                                </button>
                                              </form>
                                            </div>
                                        </div>
                                        @endif
                                      @endforeach
                                    </div>
                              </div>

                              @if(Gate::allows('wls_only', auth()->user()))
                                 
                              <form 
                                action="/categories"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                  <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">Add new category</label>
                                      <input 
                                          class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                          name="name" 
                                          type="text" 
                                          placeholder="New category name"
                                          required="" />
                                  </div>
                          
                                  <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                                    <button 
                                      class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                      type="reset" >
                                      Cancel
                                    </button>
                                    <button 
                                      class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                      type="submit">
                                      Create
                                    </button>
                                  </div>
                              </form>
                              @endif
                            </div>
                          </div>

                    </div>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    </div>






















    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
