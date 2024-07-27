<div>
    <x-page-header back="true" link="/settings/programs">Create Program</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 grid-col-2 md:grid-cols-2 lg:grid-cols-2">
                <div>
                    <x-label :required="true">Name</x-label>
                    <x-input wire:model="name" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label>Acronym</x-label>
                    <x-input wire:model="acronym" />
                    @error('acronym')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="my-5 border-t border-gray-300"></div>

            <div class="mt-5">
                <x-custom-button type="submit" wire:loading.attr="disabled">
                    Save
                </x-custom-button>
            </div>
        </form>
    </div>
</div>
