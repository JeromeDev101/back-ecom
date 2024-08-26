<div>
    <x-page-header back="true" link="/student-profile/enrolments">Create Enrollment</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 grid-col-3 md:grid-cols-2 lg:grid-cols-3">

                <div>
                    <x-label :required="true">Program</x-label>
                    <x-select wire:model="enrollment.program_id" :options="$programOptions" />
                    @error('enrollment.program_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Number of Student</x-label>
                    <x-input type="number" wire:model="enrollment.num_student" />
                    @error('enrollment.num_student')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">School Year</x-label>
                    <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-2">
                        <div>
                            <x-select wire:model.live="sy.opt1" :options="$yearOptions" />
                        </div>
                        <div>
                            <x-select wire:model.live="sy.opt2" :options="$yearOptions" />
                        </div>
                    </div>
                    <x-input type="hidden" wire:model="enrollment.sy" />
                    @error('enrollment.sy')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                    @error('year')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Semester</x-label>
                    <x-select wire:model="enrollment.semester" :options="$semesterOptions" />
                    @error('enrollment.semester')
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
