@props([
    'variant' => 'dark',
    'navigate' => null,
    'class' => '',
])

@php
    $baseClasses = "group flex items-center font-medium text-xs md:text-base px-6 py-3 rounded-full transition duration-300";
    $variants = [
        'dark' => 'bg-neutral-950 text-white hover:bg-neutral-800',
        'light' => 'bg-white text-neutral-950 hover:bg-neutral-100',
    ];
@endphp

<div class="relative inline-block">
    <button
        type="button"
        @if($navigate)
            onclick="window.location.href='{{ $navigate }}'"
        @endif
        {{ $attributes->merge(['class' => "{$baseClasses} {$variants[$variant]} {$class}"]) }}
    >
    <div class="flex">
        <span class="mr-2 text-sm">
            {{ $slot }}
        </span>
        <div class="p-1 border rounded-full w-6 h-6 flex items-center justify-center transition-transform duration-300 group-hover:translate-x-1" style="border-color: currentColor">
            <x-dynamic-component
                :component="$variant === 'dark' ? 'icon-left-arrow-dark' : 'icon-left-arrow'"
                class="currentColor w-4 h-4"
            />
        </div>
    </div>
    </button>
</div>
