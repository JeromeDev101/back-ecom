<div>
    <x-page-header back="true" link="{{ route('permissions.index') }}">Create Permission</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <div class="p-4 my-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <b>Direction:</b> Upon creating permission, it will automatically CRUD permission of Create, Read, Update and Delete.
            </div>

            <div class="grid gap-4 grid-col-2 md:grid-cols-2 lg:grid-cols-2">
                <div>
                    <x-label>Permission name</x-label>
                    <x-input class="w-full" wire:model.live="temp_name" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                    <input type="hidden" wire:model="name">

                    @if ($temp_name)
                        <div class="p-4 my-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <b>Sample output slug:</b> <br/>

                                {{Str::slug($temp_name)}}-create <br/>
                                {{Str::slug($temp_name)}}-read <br/>
                                {{Str::slug($temp_name)}}-update <br/>
                                {{Str::slug($temp_name)}}-delete <br/>
                        </div>
                    @endif
                </div>

                <div>
                    <x-label :required="true">Group name</x-label>
                    <livewire:components.select-option :options="$permissionOptions"
                     wire:model="certifications.faculty_ids" :isTag=true />
                </div>
            </div>

            <div class="flex mb-5">
                <x-custom-button  type="submit">Save</x-custom-button>
            </div>
        </form>
    </div>
</div>
