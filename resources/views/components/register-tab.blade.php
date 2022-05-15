@props(['active','route'])

@php
$classes = ($active ?? false)
            ? 'border-violet-400 text-violet-400'
            : 'border-gray-700';
@endphp

<a rel="noopener noreferrer" href="{{ $route }}" class="px-5 py-1 border-b-2 {{ $classes }}">{{ $slot }}</a>
