@props(['back' => false, 'link' => '#', 'history' => '', 'previous' => false, ''])

<h4 class="flex items-center p-2 mb-5 text-xl text-green-900 border-b-2 border-gray-300">
    @if ($previous)
        <a href="{{ $history }}" class="mr-3" wire:navigate >
            {{ $name ?? '' }}
        </a>
        <svg class="w-6 h-6 mr-3 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
        </svg>
    @endif

    @if ($back && !$previous)
        <div class="mr-3">
            <a href="{{$link}}" wire:navigate title="Back">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                </svg>
            </a>
        </div>
    @endif
    {{$slot}}
</h4>
