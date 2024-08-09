<div>
    <x-page-header history="{{ route('curriculum.index') }}" :previous="true">
        <x-slot name="name">Curriculum</x-slot>
        Academic
    </x-page-header>

    <x-custom-button size="sm" color="green" href="{{route('curriculum-academic.create')}}">Create</x-custom-button>
    <livewire:academic-table/>
</div>
