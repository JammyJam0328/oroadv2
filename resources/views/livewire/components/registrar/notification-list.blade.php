<ul role="list"
    x-intersect.once="$wire.set('intersected',true)"
    class="divide-y divide-gray-200">

    @forelse ($notifications as $notification)
        <li
            class="relative px-2 py-2 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
            <div class="flex justify-between space-x-3">
                <div class="flex min-w-0 space-x-2">
                    @if ($notification->read_at)
                        <svg id="read"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    @else
                        <svg id="unread"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-gray-700"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    @endif
                    <div class="block focus:outline-none">
                        <span class="absolute inset-0"
                            aria-hidden="true"></span>
                        <p
                            class="text-sm  truncate {{ $notification->read_at ? 'text-gray-600 font-thin' : 'font-medium text-gray-900' }}">
                            {{ $notification->data['user_name'] }}
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                            {{ $notification->data['activity'] }}
                        </p>
                    </div>
                </div>
                <time datetime="2021-01-27T16:35"
                    class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">
                    {{ $notification->created_at->diffForHumans() }}
                </time>
            </div>

        </li>
    @empty
        <li class="flex items-center justify-center h-full">
            @if ($intersected)
                <p class="text-sm text-gray-500">
                    No new notifications
                </p>
            @else
                <div wire:loading.flex
                    class="flex items-center justify-center w-full h-full">
                    <h1 class="animate-bounce">
                        Loading...
                    </h1>
                </div>
            @endif
        </li>
    @endforelse
</ul>
