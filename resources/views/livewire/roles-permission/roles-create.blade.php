<div>
    <x-page-header back="true" link="/roles-and-permission">Create Role</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <div class="mb-5">
                <x-label>Role name</x-label>
                <x-input class="w-full" required wire:model="name" />

            </div>
            <div class="mb-5">
                <x-custom-button type="submit">Save</x-custom-button>
            </div>
        </form>
    </div>
</div>
