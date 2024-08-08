<div>
    <x-page-header back="true" link="{{ route('curriculum-academic.index') }}">Create Academic</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 grid-col-3 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <x-label :required="true">Program</x-label>
                    <x-select wire:model="academic.program_id" :options="$programOptions" />
                    @error('academic.program_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">COPC status</x-label>
                    <x-select wire:model="academic.is_copc" :options="$statusAcademicOptions" />
                    @error('academic.is_copc')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">COPC number</x-label>
                    <x-input type="number" wire:model="academic.copc_number" />
                    @error('academic.copc_number')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Date held</x-label>
                    <x-input type="date" wire:model="academic.date_held" />
                    @error('academic.date_held')
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
