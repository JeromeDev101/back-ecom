<div>
    <x-page-header back="true" link="{{ route('curriculum-num-national-tvet.index') }}">Create Student Qualifications and Certifications</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Type of Certifications</x-label>
                    <x-textarea model="certifications.certification_type" placeholder="Please provide type of certifications..."/>
                    @error('certifications.certification_type')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Number of Student</x-label>
                    <x-input type="number" wire:model="certifications.num_student" />
                    @error('certifications.num_student')
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
