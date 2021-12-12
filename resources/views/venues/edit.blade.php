<x-app-layout>

  <div class="w-3/4 text-black">
    @livewire('select-input')
  </div>
  

  {{-- <x-select
label="Select Statuses"
placeholder="Select many statuses"
multiselect
:options="['Active', 'Pending', 'Stuck', 'Done']"
wire:model.defer="disabled"
/>  --}}

<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
<label for="vehicle1"> I have a bike</label><br>
<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
<label for="vehicle2"> I have a car</label><br>
<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
<label for="vehicle3"> I have a boat</label><br>

  <input type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent">

  <div class="mt-4">
    <x-jet-label for="gender" value="{{ __('Gender ') }} (Optional)" />
    <select 
        multiple
        name="gender"
        id="gender"
        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        wire:model.defer="gender"
        >
        <optgroup label="Gender">
            <option value="men">Men</option>
            <option value="female">Female</option>
            <option 
                selected
                value="all">Not specified</option>
        </optgroup>
        {{-- <optgroup label="Gender">
        <option value="montreal">Montreal</option>
        <option value="qc">Quebec City</option>
        </optgroup> --}}
    </select>            
</div>

    <div class="bg-yellow-500 relative h-32 w-32 mx-auto">
        <div class="bg-gray-500 absolute inset-x-0 bottom-0 h-16">1</div>
      </div>

<div class="bg-gray-500 mx-auto mt-5 w-1/5 h-96 text-center">
   
    <div class="bg-yellow-500 m-auto w-3/4 h-48 ">
      
        <div class="bg-red-500 m-auto w-3/4 h-24">
          
            <div class="bg-green-500 m-auto w-3/4 h-12">
                
            </div>
        </div>
    </div>
</div>

<div>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
</div>



  <!-- This is an example component -->
<div class="flex justify-center">
    <label for="toogleButton" class="flex items-center cursor-pointer">
       <div class="px-2">Toggle me</div>
   <!-- toggle -->
   <div class="relative">
     <input id="toogleButton" type="checkbox" class="hidden" />
     <!-- path -->
     <div
       class="toggle-path bg-gray-200 w-9 h-5 rounded-full shadow-inner"
     ></div>
     <!-- crcle -->
     <div
       class="toggle-circle absolute w-3.5 h-3.5 bg-white rounded-full shadow inset-y-0 left-0"
     ></div>
   </div>
 </label>

</div>

<x-input label="Name" placeholder="your name" />
{{-- <x-datetime-picker
    label="Appointment Date"
    placeholder="Appointment Date"
    wire:model.defer="normalPicker"
/> --}}

<x-textarea label="Annotations" placeholder="write your annotations" />

{{-- <x-select
label="Select Status"
placeholder="Select one status"
:options="['Active', 'Pending', 'Stuck', 'Done']"
wire:model.defer="select"/> --}}
{{-- 
<x-modal.card title="Edit Customer" blur wire:model.defer="cardModal">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<x-input label="Name" placeholder="Your full name" />
<x-input label="Phone" placeholder="USA phone" />
<div class="col-span-1 sm:col-span-2">
<x-input label="Email" placeholder="example@mail.com" />
</div>
<div class="col-span-1 sm:col-span-2 cursor-pointer bg-gray-100 rounded-xl shadow-md h-72 flex items-center justify-center">
<div class="flex flex-col items-center justify-center">
<x-icon name="cloud-upload" class="w-16 h-16 text-blue-600" />
<p class="text-blue-600">Click or drop files here</p>
</div>
</div>
</div>
<x-slot name="footer">
<div class="flex justify-between gap-x-4">
<x-button flat negative label="Delete" wire:click="delete" />
<div class="flex">
<x-button flat label="Cancel" x-on:click="close" />
<x-button primary label="Save" wire:click="save" />
</div>
</div>
</x-slot>
</x-modal.card> --}}

<style>

.toggle-path {
   transition: background 0.3s ease-in-out;
}
.toggle-circle {
   top: 0.2rem;
   left: 0.25rem;
   transition: all 0.3s ease-in-out;
}
input:checked ~ .toggle-circle {
   transform: translateX(100%);
}
input:checked ~ .toggle-path {
   background-color:#81E6D9;
}
</style>

<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }
    </style>
                   
    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
        <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div>
    <label for="toggle" class="text-xs text-gray-700">Toggle me.</label>


    {{-- <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/profile-photos/IuV3zRKNQVl0dKj5dnlV2QtANBND42oL0GeJEICa.jpg') }}" alt="{{ Auth::user()->name }}" /> --}}


<div class="flex flex-col bg-gray-500 mx-auto mt-5 w-4/5 h-96">
   
    <div class="flex bg-yellow-500 m-auto w-3/4 h-48">
        <div class="flex bg-red-500 m-auto w-3/4 h-24 ">
        </div>
    </div>
      
        
          
            <div class="flex bg-green-500 m-auto w-3/4 h-12">
            </div>
                
            
        
</div>



{{ $day }}



</x-app-layout>