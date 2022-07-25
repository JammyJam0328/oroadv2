@props(['label', 'to', 'active'])
<a href="{{ $to }}"
    class="flex items-center px-2 py-2 font-medium text-white duration-300 ease-in-out rounded-md bg-dominant group   {{ $active ? 'bg-green-700 shadow-md' : 'hover:bg-green-700 hover:shadow' }}">
    {{ $slot }}
    {{ $label }}
</a>
