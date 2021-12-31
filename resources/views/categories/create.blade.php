<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    @if ($errors->any())
      <div class="w-4/5 m-auto">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="w-1/5 mb-4 mr-6 text-gray-50 bg-red-700 rounded-2xl py-2 px-4 inline">
                      {{ $error }}
                  </li>
              @endforeach
          </ul>
      </div>
    @endif

    
    

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
          
          <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Current Categories</label>
                <div class="grid grid-cols-2 py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                  @foreach ($categories as $category)
                    <div class="grid grid-cols-1 border-b  border-purple-300 mb-2">
                        {{ $category->name }}
                    </div>
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
                  @endforeach
                </div>
          </div>
             
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
        </div>
      </div>
  

</x-app-layout>