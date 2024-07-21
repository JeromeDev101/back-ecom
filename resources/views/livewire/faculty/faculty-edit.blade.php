<div>
    <x-page-header back="true" link="/faculty-profile">Edit Faculty</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <h4 class="text-teal-500 text-lg">Personal Information</h4>
            <hr class="mb-4 mt-2" />

            <div class="grid grid-col-3 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <x-label :required="true">First name</x-label>
                    <x-input wire:model="faculty.first_name" />
                    @error('faculty.first_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label>Middle name</x-label>
                    <x-input wire:model="faculty.middle_name" />
                    @error('faculty.middle_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Last name</x-label>
                    <x-input wire:model="faculty.last_name" />
                    @error('faculty.last_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Email</x-label>
                    <x-input type="email" wire:model="faculty.email" />
                    @error('faculty.email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Nature of Appointment</x-label>
                    <x-select wire:model="faculty.nature_of_appointment_id" :options="$natureOfAppointmentOptions" />
                    @error('faculty.nature_of_appointment_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Gender</x-label>
                    <x-select wire:model="faculty.gender" :options="$genderOptions"/>
                    @error('faculty.gender')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <h4 class="text-teal-500 text-lg mt-5">Educational Information</h4>
            <hr class="mb-4 mt-2" />

            <div class="grid grid-col-2 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <div>
                    <x-label :required="true">Educational Attainment</x-label>
                    <x-select wire:model="faculty.educational_attainment_id" :options="$educAttainmentOptions" />
                    @error('faculty.educational_attainment_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Academic rank</x-label>
                    <x-select wire:model="faculty.academic_rank_id" :options="$academicRankOptions" />
                    @error('faculty.academic_rank_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
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
