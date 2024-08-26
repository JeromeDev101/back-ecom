<div>
    <x-page-header>
        Enrollments
    </x-page-header>

    <x-custom-button size="sm" color="green" href="{{route('enrollment.create')}}">Create</x-custom-button>
    <livewire:enrolment-table/>
</div>
