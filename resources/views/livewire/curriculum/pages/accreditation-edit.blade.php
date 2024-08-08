<div>
    <x-page-header back="true" link="{{ route('curriculum-accreditation.index') }}">Edit Accreditation</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 grid-col-3 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <x-label :required="true">Program</x-label>
                    <x-select wire:model="accreditation.program_id" :options="$programOptions" />
                    @error('accreditation.program_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Level</x-label>
                    <x-select wire:model="accreditation.level" :options="$statusAccreditationLevelOptions" />
                    @error('accreditation.level')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Status</x-label>
                    <x-select wire:model="accreditation.status" :options="$statusAccreditationOptions" />
                    @error('accreditation.status')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Date held</x-label>
                    <x-input type="date" wire:model="accreditation.date_visit" />
                    @error('accreditation.date_visit')
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
