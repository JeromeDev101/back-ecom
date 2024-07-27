@props(['title' => 'Title here..', 'body' => null, 'button' => false, 'href' => '#', 'buttonText' => 'Read more'])

<div class="block text-left bg-white rounded-md shadow-lg dark:bg-neutral-700">

    <div class="px-6 py-4 border-b-2 border-neutral-100 dark:border-neutral-500">
        <h5 class="flex items-center justify-start text-neutral-500 dark:text-neutral-300">
        <span class="mr-2">
            @if ($button)
                <a href="{{$href}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{$buttonText}}
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            @endif
        </span>

        </h5>
    </div>

    <div class="p-6">
        @if($body)
            <h5 class="mb-2 text-xl font-bold tracking-wide text-neutral-800 dark:text-neutral-50">
                {{ $body }}
            </h5>
        @endif
    </div>

</div>
