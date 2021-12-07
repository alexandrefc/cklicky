{{-- <html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
  <script src="client.js" defer></script>
</head>
<body>
  <section> --}}

    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('cKlicky.com') }}
              
          </h2>
      </x-slot>

    <div class="product Box-root">
      {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="16px" viewBox="0 0 14 16" version="1.1">
          <defs/>
          <g id="Flow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="0-Default" transform="translate(-121.000000, -40.000000)" fill="#E184DF">
                  <path d="M127,50 L126,50 C123.238576,50 121,47.7614237 121,45 C121,42.2385763 123.238576,40 126,40 L135,40 L135,56 L133,56 L133,42 L129,42 L129,56 L127,56 L127,50 Z M127,48 L127,42 L126,42 C124.343146,42 123,43.3431458 123,45 C123,46.6568542 124.343146,48 126,48 L127,48 Z" id="Pilcrow"/>
              </g>
          </g>
      </svg> --}}
      <div class="description Box-root">
        <div class="text-indigo-300 font-bold mt-16 text-center">
          <h3>Subscription to White label solution Basic successful!</h3>
        
          <form action="/create-portal-session.php" method="POST">
            @csrf
            <input type="hidden" id="session-id" name="session_id" value="{{ $sessionId }}" />
            <button id="checkout-and-portal-button" type="submit">Manage your billing information</button>
          </form>
        </div>
      </div>
    </div>
    
  {{-- </section>
</body>
</html> --}}


</x-app-layout>