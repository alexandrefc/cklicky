<x-app-layout>
  {{-- <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('cKlicky.com') }}
          
      </h2>
  </x-slot> --}}

  {{-- <div class="w-4/5 m-auto text-left">
      <div class="py-15">
          <h1 class="text-6xl">
              Create a venue
          </h1>
      </div>
  </div> --}}
  
  @if ($errors->any())
      <div class="w-11/12 m-auto my-6">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="w-1/5 mb-4 mt-2 mr-2 text-gray-50 bg-red-700 text-xs md:text-sm rounded-2xl py-1 px-2 inline">
                      {{ $error }}
                  </li>
              @endforeach
          </ul>
      </div>
    @endif

  
  
<div class="w=4/5 m-auto">
    <div 
        class="relative min-h-screen flex items-center justify-center bg-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8  bg-no-repeat bg-cover"
        {{-- style="background-image: url(https://images.unsplash.com/photo-1532423622396-10a3f979251a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1500&q=80);" --}}
          >
    {{-- <div 
          class="absolute bg-black opacity-60 inset-0 z-0">
      </div> --}}
        <div class="w-11/12 md:w-9/12 lg:w-1/2 space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Update venue</h2>
                            <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">

                            </div>
                    </div>
                    <div class="mt-5">
                        <form 
                        action="/venues/{{ $venue->slug }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form">
                            <div class="mb-3">
                                <label 
                                    class="text-xs font-semibold text-gray-600 py-2">
                                    Update Company Logo & Map icon - leave blank if you don't want to change
                                        {{-- <abbr class="hidden" title="required">*</abbr> --}}
                                </label>
                                    <div class="flex-row sm:flex items-center py-2">
                                        <div class="w-full sm:w-1/2 my-1 h-20 mr-4 flex-none rounded-xl border overflow-hidden">
                                            <img class="p-1 h-full m-auto object-center " src="{{ asset('storage/images/loyalty/' . $venue->logo_path) }}" alt="Logo">
                                        </div>
                                        <div class="w-full sm:w-1/2 h-20 mr-4 flex-none rounded-xl border overflow-hidden">
                                            <img class="p-1 h-full m-auto object-center " src="{{ asset('storage/images/icons/' . $venue->map_icon_path) }}" alt="Map Icon">
                                        </div>
                                    </div>
                                    <div class="w-full py-2">
                                        @livewire('upload-logo')
                                    </div>
                                    <div class="w-full py-2">
                                        @livewire('upload-map-icon')
                                    </div>
                                    
                            </div>
                            
                            
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">
                                        Company  Name 
                                        {{-- <abbr 
                                            class="hidden"
                                            title="required">
                                            *
                                        </abbr> --}}
                                    </label>
                                    <input 
                                        placeholder="Company Name"
                                        value="{{ $venue->title }}" 
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                        required="required" 
                                        type="text" 
                                        name="title" 
                                        id="title">
                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">
                                        Company  Mail 
                                        {{-- <abbr title="required">
                                            *
                                        </abbr> --}}
                                    </label>
                                    <input 
                                        placeholder="example@mail.com" 
                                        value="{{ $venue->email }}"
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                        required="required"
                                        type="text" 
                                        name="email" 
                                        id="email">
                                            <p class="text-red text-xs hidden">Please fill out this field.</p>
                                </div>
                            </div>
                          
                            <div class="mb-3 space-y-2 w-full text-xs">
                                <label class=" font-semibold text-gray-600 py-2">
                                    Company  Website
                                </label>
                                <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                    <div class="flex">
                                        <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center rounded-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                        <input 
                                        type="text" 
                                        name="website"
                                        required="required"
                                        class="flex-shrink flex-grow flex-auto leading-normal w-px border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" 
                                        placeholder="example.com"
                                        value="{{ $venue->website }}">
                                </div>
                            </div>

                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Company Address</label>
                                    <input 
                                        required="required"
                                        placeholder="Address" 
                                        value="{{ $venue->location }}" 
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                        type="text" 
                                        name="location" 
                                        id="location">
                                </div>
                                                 
                            </div>
                          
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                
                                {{-- <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">PIN - 4 digits</label>
                                    <input 
                                        placeholder="1234" 
                                        value="{{ $venue->pin }}" 
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" 
                                        type="text" 
                                        pattern="[0-9]{4}"
                                        name="pin" 
                                        id="pin"
                                        >
                                </div> --}}
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Category</label>
                                    <select 
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        name="category_id"
                                        value="{{ $venue->category_id }}">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($venue->category_id == $category->id) 
                                                        selected='selected'
                                                    @endif >{{ $category->name }}
                                                </option>
                                            @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                          {{-- <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                              
                              <div class="w-full flex flex-col mb-3">
                                  <label class="font-semibold text-gray-600 py-2">Location<abbr title="required">*</abbr></label>
                                  <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" name="integration[city_id]" id="integration_city_id">
                                      <option value="">Seleted location</option>
                                      <option value="">Cochin,KL</option>
                                      <option value="">Mumbai,MH</option>
                                      <option value="">Bangalore,KA</option>
                                  </select>
                                  <p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
                              </div>
                          </div> --}}
                            <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Description</label>
                                    <textarea 
                                        
                                        name="description" 
                                        id="description" 
                                        class="min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" 
                                        placeholder="Enter your company info" 
                                        spellcheck="false">
                                    </textarea>
                                {{-- <p class="text-xs text-gray-400 text-left my-3">You inserted 0 characters</p> --}}
                            </div>
                          {{-- <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                              asterisk <abbr title="Required field">*</abbr>
                          </p> --}}
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button 
                                    class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"
                                    type="reset"> 
                                    Cancel 
                                </button>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  var $textAreaDescription = document.getElementById("description").value = "{{ $venue->description }}";

</script>

</x-app-layout>