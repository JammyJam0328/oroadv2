  <div class="space-y-3">
      <div class="flex justify-between">
          <h1 class="text-lg">
              Request Documents
          </h1>

      </div>
      <div class="space-y-3">
          @foreach ($request_documents as $key => $request_document)
              <div wire:key="{{ $key }}{{ $request_document->id }}">
                  <x-card shadow="shadow-none"
                      color="border-green-600 border"
                      padding="px-2 py-2 md:px-2 "
                      title=" {{ $request_document->campusDocument->document->name }}">
                      <x-slot name="action">
                          <div>
                              @if ($this->allowedActions())
                                  @if ($request_document->docx_status == 'pending')
                                      <div class="flex justify-end space-x-2">
                                          <div id="{{ $key }}-approved{{ $request_document->id }}">
                                              <x-button info
                                                  flat
                                                  wire:click="approvedConfirmation({{ $request_document->id }})"
                                                  spinner="approvedConfirmation({{ $request_document->id }})"
                                                  xs>
                                                  Approve
                                              </x-button>
                                          </div>
                                          <div id="{{ $key }}-deny-{{ $request_document->id }}">
                                              <x-button negative
                                                  wire:click="denyRequestDocument({{ $request_document->id }})"
                                                  spinner="denyRequestDocument({{ $request_document->id }})"
                                                  flat
                                                  xs>
                                                  Deny
                                              </x-button>
                                          </div>
                                      </div>
                                  @else
                                      <div class="flex justify-end space-x-2">
                                          <div id="{{ $key }}-undo{{ $request_document->id }}">
                                              <x-button gray
                                                  flat
                                                  wire:click="undoRequestDocumentStatus({{ $request_document->id }})"
                                                  spinner="undoRequestDocumentStatus({{ $request_document->id }})"
                                                  xs>
                                                  Undo
                                              </x-button>
                                          </div>
                                      </div>
                                  @endif
                              @endif
                          </div>
                      </x-slot>
                      <div class="spacy-3">
                          <div>
                              <div class="grid space-x-2 space-y-2">
                                  @if ($this->allowedActions())
                                      @if ($request_document->campusDocument->document->id == '5' && $request_document->docx_status == 'pending')
                                          <x-input type="number"
                                              wire:model.defer="number_of_pages"
                                              label="Update Number of Pages"
                                              corner-hint="Current: {{ $request_document->number_of_pages }} Page(s) "
                                              hint="First Page Php 75 - Succeeding Php 50">
                                              <x-slot name="append">
                                                  <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                                                      <x-button wire:click="savePage({{ $request_document->id }})"
                                                          class="h-full rounded-r-md"
                                                          icon="plus"
                                                          info
                                                          squared />
                                                  </div>
                                              </x-slot>
                                          </x-input>
                                      @endif
                                  @endif
                                  <div>
                                      @if ($request_document->withAuth)
                                          <span
                                              class="inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium bg-indigo-100 text-green-700">
                                              With Authentication
                                          </span>
                                      @else
                                          <span
                                              class="inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium bg-indigo-100 text-gray-700">
                                              Without Authentication
                                          </span>
                                      @endif
                                      <span
                                          class="inline-flex rounded-full items-center py-0.5 pl-2.5 pr-1 text-xs font-medium bg-indigo-100 text-indigo-700">
                                          {{ $request_document->copy }} copy(s)
                                      </span>
                                  </div>

                              </div>
                          </div>

                      </div>
                  </x-card>
              </div>
          @endforeach
      </div>
  </div>
