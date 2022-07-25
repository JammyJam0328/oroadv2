  <div class="flex flex-col">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                          <tr>
                              <th scope="col"
                                  class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                  Document
                              </th>
                              <th scope="col"
                                  class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                  Amount
                              </th>
                              <th scope="col"
                                  class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                  Other Description
                              </th>
                              <th scope="col"
                                  class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                  Status
                              </th>
                              <th scope="col"
                                  class="relative py-2 pl-3 pr-4 sm:pr-6">
                                  <span class="sr-only">Edit</span>
                              </th>
                          </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                          @forelse ($documents as $key=>$document)
                              <tr wire:key="{{ $key }}-document"
                                  class="hover:bg-green-100">
                                  <td
                                      class="py-2.5 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                      {{ $document->document->name }}
                                  </td>
                                  <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                      {{ $document->document->price }}
                                  </td>
                                  <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                      {{ $document->document->other_description }}
                                  </td>
                                  <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                      {{ $document->status }}
                                  </td>
                                  <td
                                      class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                      <div class="flex justify-end space-x-3">
                                          @if ($document->status == 'Available')
                                              <x-button negative
                                                  wire:key="un-{{ $key }}-document"
                                                  wire:click="markAsUnavailable({{ $document->id }})">
                                                  Unavailable
                                              </x-button>
                                          @else
                                              <x-button positive
                                                  wire:key="av-{{ $key }}-document"
                                                  wire:click="markAsAvailable({{ $document->id }})">
                                                  Available
                                              </x-button>
                                          @endif
                                      </div>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="4"
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
