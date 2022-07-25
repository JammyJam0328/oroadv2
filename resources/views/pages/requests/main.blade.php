@extends('layouts.registrar.app')

@section('main')
    <div class="py-6">
        <div class="px-4 sm:px-6 md:px-0">
            <h1 class="text-2xl font-semibold text-gray-700">Requests</h1>
        </div>
        <div class="px-4 sm:px-6 md:px-0 mt-10">
            <div>
                @livewire('request.request-list')
            </div>
        </div>
    </div>
@endsection
