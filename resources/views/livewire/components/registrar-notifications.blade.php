  <div>
      <div class="flex justify-end">
          <x-native-select :options="['10', '20', '30', '40']"
              wire:model.debounce="take" />
      </div>
      <div class="flex flex-col mt-2">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                  <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                      <table class="min-w-full">
                          <tbody class="bg-white divide-y divide-gray-200 ">
                              @forelse ($notifications as $notification)
                                  <tr
                                      class="border-gray-300 {{ $notification->read_at ? 'hover:bg-gray-100' : 'bg-green-100 ' }}">
                                      <td class="py-4 pl-4 pr-3 text-sm font-medium whitespace-nowrap sm:pl-6">
                                          @switch($notification->data['activity_type'])
                                              @case('new-request')
                                                  <h1 class="text-green-600">New request</h1>
                                              @break

                                              @case('payment-submitted')
                                                  <h1 class="text-green-600">Payment Submitted</h1>
                                              @break
                                          @endswitch
                                      </td>
                                      <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                          {{ $notification->data['activity'] }}
                                      </td>
                                      </td>
                                      <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                          {{ $notification->created_at->diffForHumans() }}
                                      </td>

                                      <td
                                          class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                          @if (!$notification->read_at)
                                              <x-button wire:click="markAsRead('{{ $notification->id }}')"
                                                  flat
                                                  info
                                                  spinner="markAsRead('{{ $notification->id }}')"
                                                  xs>
                                                  Mark as Read
                                              </x-button>
                                          @else
                                              <x-button wire:click="markAsUnread('{{ $notification->id }}')"
                                                  flat
                                                  gray
                                                  spinner="markAsUnread('{{ $notification->id }}')"
                                                  xs>
                                                  Mark as Unread
                                              </x-button>
                                          @endif
                                      </td>
                                  </tr>
                                  @empty
                                      <tr>
                                          <td colspan="4"
                                              class="py-2 text-center">
                                              <h1 class="text-gray-500">No notifications</h1>
                                          </td>
                                      </tr>
                                  @endforelse
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
