<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('cKlicky.com') }}
          
      </h2>
  </x-slot>

  <div class="text-indigo-300 font-bold mt-16 text-center">
    <p class="m-auto">Picked the wrong subscription ?</p>
    <a 
      href="/pricing"
      class="font-extrbold font-serif " >
      Go back
    </a>
  </div>
    
  
</x-app-layout>