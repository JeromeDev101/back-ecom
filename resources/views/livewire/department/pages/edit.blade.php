<div>
    <x-page-header back="true" link="/settings/departments">Edit Department</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 grid-col-3 md:grid-cols-2 lg:grid-cols-3">
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
                    <x-label>Theme Color</x-label>
                    <x-input type="color" wire:model="theme_color" />
                    @error('theme_color')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label>Logo</x-label>
                    <x-input type="file" wire:model="logo" accept="image/x-png,image/gif,image/jpeg" />
                    @error('logo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                    @if ($img_preview['path'])
                        <img class="h-auto max-w-lg p-2 mt-2 border rounded-lg" style="height: 150px;" src="{{ asset('storage/'.$img_preview['path']) }}" alt="{{ $img_preview['orig_name'] }}">
                    @endif

                </div>
            </div>

            <div class="my-5 border-t border-gray-300"></div>

            <div class="mt-5">
                <x-custom-button type="submit" wire:loading.attr="disabled">
                    Save Changes
                </x-custom-button>
            </div>

        </form>
    </div>
</div>
