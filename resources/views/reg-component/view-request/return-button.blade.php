   @if (Request::routeIs('registrar.request.details'))
       <div x-data>
           @php
               $return_url;
               $current_action = request('action');
               switch ($current_action) {
                   case 'pending':
                       $return_url = route('registrar.pending-request');
                       break;
                   case 'approved':
                       $return_url = route('registrar.approved-request');
                       break;
                   case 'payment-to-review':
                       $return_url = route('registrar.payment-to-review');
                       break;
                   case 'ready-to-claim':
                       $return_url = route('registrar.to-claim');
                       break;
                   case 'claimed':
                       $return_url = route('registrar.claimed');
                       break;
                   case 'denied':
                       $return_url = route('registrar.denied');
                       break;
               }
           @endphp
           <x-button flat
               x-on:keyup.escape.window="location.href='{{ $return_url }}'"
               href="{{ $return_url }}"
               icon="arrow-narrow-left">
               <span class="font-mono text-gray-300">(Escape key)</span>
           </x-button>
       </div>
   @endif
