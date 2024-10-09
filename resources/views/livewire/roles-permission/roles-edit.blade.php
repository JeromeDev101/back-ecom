<div>
    <x-page-header back="true" link="{{ route('roles-permission.index') }}" >Edit Role</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <x-label>Role name</x-label>
                <x-input class="w-full" wire:model="name" />
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <div class="row">
                    @foreach ($permissions as $key => $permission)
                        <div class="mb-3 col-4">
                            <h6 class="text-uppercase text-info">{{ $key }}</h6>
                            @foreach ($permission as $sub)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $sub['name'] }}"
                                        id="{{ $sub['name'] }}"
                                        wire:click="assignedPermission('{{ $sub['name'] }}', $event.target.checked)"
                                        {{ in_array($sub['name'], $permissionCheckbox) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="{{ $sub['name'] }}">
                                        {{ $sub['name'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    @foreach ($errors['permissionCheckbox'] ?? [] as $error)
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="mb-5">
                <x-custom-button type="submit">Save Changes</x-custom-button>
            </div>
        </form>
    </div>
</div>
