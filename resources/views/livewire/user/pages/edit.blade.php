<div>
    <x-page-header back="true" link="/users">Create User</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <h4 class="text-lg text-teal-500">Basic Information</h4>
            <hr class="mt-2 mb-4" />

            <div class="grid gap-4 grid-col-3 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <x-label :required="true">Name</x-label>
                    <x-input wire:model="name" />
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Email</x-label>
                    <x-input type="email" wire:model="email" />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <x-label :required="true">Role</x-label>
                    <x-select wire:model="role" :options="$roleOptions" />
                    @error('role')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div x-data="{ show: false }">
                    <x-label >Password</x-label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password" wire:model.defer="password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" @click="show = !show">
                            <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-gray-500 dark:text-gray-400"></i>
                        </span>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div x-data="{ show: false }">
                    <x-label >Confirm Password</x-label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password_confirmation" wire:model.defer="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" @click="show = !show">
                            <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-gray-500 dark:text-gray-400"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="pt-5">
                    {{ $is_active }}
                    <x-checked-toggle label="{{ $is_active ? 'Active':'Inactive' }}" wire:change="$toggle('is_active')" :checked="$is_active" />
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
