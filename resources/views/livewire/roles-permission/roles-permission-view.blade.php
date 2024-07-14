<div>
    <x-page-header>Roles and Permissions</x-page-header>

    <div wire:ignore class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        @php
            $setActiveTabClass = 'inline-block p-4 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500';
            $setInactiveTabClass = 'inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300';
        @endphp
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="me-2">
                <button id="roles-tab" data-tabs-target="#roles" wire:click="setActiveTab('roles')" type="button" role="tab" aria-controls="roles" aria-selected="{{$activeTab == 'roles' ? 'true':'false'}}" class="{{$activeTab == 'roles' ? $setActiveTabClass:$setInactiveTabClass}}">
                    Roles
                </button>
            </li>
            <li class="me-2">
                <button id="permission-tab" data-tabs-target="#permissions" wire:click="setActiveTab('permission')" type="button" role="tab" aria-controls="permissions" aria-selected="{{$activeTab == 'permission' ? 'true':'false'}}" class="{{$activeTab == 'permission' ? $setActiveTabClass:$setInactiveTabClass}}">
                    Permissions
                </button>
            </li>
        </ul>
        <div id="defaultTabContent">

            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                <x-custom-button size="sm" color="green" href="{{route('roles.create')}}">Add Role</x-custom-button>
                <livewire:roles-table/>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="permissions" role="tabpanel" aria-labelledby="permission-tab">
                <x-custom-button size="sm" color="green" href="{{route('permissions.create')}}">Add Permission</x-custom-button>
                <livewire:permissions-table/>
            </div>
        </div>
    </div>

</div>
