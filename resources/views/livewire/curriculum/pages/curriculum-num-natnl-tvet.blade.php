<div>
    <x-page-header history="{{ route('curriculum.index') }}" :previous="true">
        <x-slot name="name">Curriculum</x-slot>
        Students Qualification and Certification
    </x-page-header>

    <x-custom-button size="sm" color="green" href="{{route('curriculum-num-national-tvet.create')}}">Create</x-custom-button>
    <livewire:qualification-table />
</div>
