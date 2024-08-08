<div>
    <x-page-header back="true" link="{{ route('curriculum-performance.index') }}">Edit Performance</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Type of Examination</x-label>
                    <x-textarea model="performance.exam_type" placeholder="Please indicate the type of examination..."/>
                    @error('performance.exam_type')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 grid-col-2 md:grid-cols-2 lg:grid-cols-2">
                <div>
                    <x-label :required="true">CVSU %</x-label>
                    <x-input type="number" wire:model="performance.cvsu_passing" />
                    @error('performance.cvsu_passing')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">National %</x-label>
                    <x-input type="number" wire:model="performance.natl_passing" />
                    @error('performance.natl_passing')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <x-label :required="true">Date Held @if(!$checkboxDate) From @endif</x-label>
                    <x-input type="date" wire:model.live="performance.date_held_from" />

                    <label class="flex items-center mt-2">
                        <x-checkbox wire:model.live="checkboxDate" />
                        <span class="text-sm text-gray-600 ms-2">Same date</span>
                    </label>
                    @error('performance.date_held_from')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                @if(!$checkboxDate)
                    <div>
                        <x-label :required="true">Date Held To</x-label>
                        <x-input type="date" wire:model="performance.date_held_to" />
                        @error('performance.date_held_to')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                @endif

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
