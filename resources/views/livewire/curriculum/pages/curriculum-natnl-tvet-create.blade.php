<div>
    <x-page-header back="true" link="{{ route('curriculum-national-tvet.index') }}">Create Qualifications and Certifications</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Faculty</x-label>
                    <livewire:components.select-option :options="$facultyOptions" wire:model="certifications.faculty_ids" />
                    @error('certifications.faculty_ids')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Type of Certifications</x-label>
                    <x-textarea model="certifications.type" placeholder="Please provide type of certifications..."/>
                    @error('certifications.banner_text')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Date Held</x-label>
                    <x-input type="date" wire:model="certifications.date_held" />
                    @error('certifications.date_held')
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
