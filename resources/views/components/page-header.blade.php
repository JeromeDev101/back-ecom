@props(['back' => false, 'link' => '#'])

<h4 class="text-green-900 text-2xl mb-4 flex items-center">
    @if ($back)
        <div class="mr-3">
            <a href="{{$link}}" wire:navigate title="Back">
                <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                </svg>
            </a>
        </div>
    @endif
    {{$slot}}
</h4>
