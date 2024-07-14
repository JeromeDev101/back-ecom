<div>
    <x-page-header back="true" link="/faculty-profile">Create Faculty</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <div class="grid grid-col-3 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <x-label :required="true">First name</x-label>
                    <x-input wire:model="first_name" />
                </div>
                <div>
                    <x-label :required="true">Middle name</x-label>
                    <x-input wire:model="middle_name" />
                </div>
                <div>
                    <x-label :required="true">Last name</x-label>
                    <x-input wire:model="last_name" />
                </div>
            </div>
        </form>
    </div>
</div>
