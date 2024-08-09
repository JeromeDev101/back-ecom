<div>
    <x-page-header history="{{ route('curriculum.index') }}" :previous="true">
        <x-slot name="name">Curriculum</x-slot>
        Accreditation
    </x-page-header>

    <x-custom-button size="sm" color="green" href="{{route('curriculum-accreditation.create')}}">Create</x-custom-button>
    <livewire:accreditation-table/>
</div>
