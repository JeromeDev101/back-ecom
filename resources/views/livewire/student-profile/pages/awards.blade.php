<div>
    <x-page-header>Recognition and Awards</x-page-header>

    <div class="mb-5 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('awards.index') }}" wire:navigate class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group">
                    Listing
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('awards-photo.index') }}" wire:navigate class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                    Photos
                </a>
            </li>
        </ul>
    </div>

    <x-custom-button size="sm" color="green" href="{{route('awards.create')}}">Create</x-custom-button>
    <livewire:recognition-table/>
</div>
