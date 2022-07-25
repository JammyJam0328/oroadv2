  <div class="flex flex-col">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                          <tr>
                              <th scope="col"
                                  class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                  Request Code
                              </th>
                              <th scope="col"
                                  class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                  Name
                              </th>
                              <th scope="col"
                                  class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                  Date
                              </th>
                              <th scope="col"
                                  class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                  Purpose
                              </th>

                              <th scope="col"
                                  class="relative py-2 pl-3 pr-4 sm:pr-6">
                                  <span class="sr-only">Edit</span>
                              </th>
                          </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                          @forelse ($requests as $request)
                              <tr class="hover:bg-green-100">
                                  <td
                                      class="py-2.5 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                      {{ $request->request_code }}
                                  </td>
                                  <td
                                      class="py-2.5 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                      {{ $request->user->information->first_name }}
                                      {{ $request->user->information->middle_name }}
                                      {{ $request->user->information->last_name }}
                                  </td>
                                  <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                      {{ $request->created_at->format('M d, Y') }}
                                  </td>
                                  <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                      {{ $request->purpose }}
                                  </td>
                                  <td
                                      class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                      <div class="flex justify-end space-x-3">
                                          <x-button wire:click="viewDetails({{ $request->id }})"
                                              xs
                                              flat>
                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                  class="w-6 h-6"
                                                  fill="none"
                                                  viewBox="0 0 24 24"
                                                  stroke="currentColor"
                                                  stroke-width="2">
                                                  <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M9 5l7 7-7 7" />
                                              </svg>
                                          </x-button>
                                      </div>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="5"
                                      class="py-3 text-center">
                                      No pending requests
                                  </td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
