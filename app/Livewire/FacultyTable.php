<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Query\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class FacultyTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $columns = [
            'faculties.*',
            'educational_attainments.name as educ_attain_name',
            'nature_of_appointments.name as nature_of_appointment_name',
        ];
        return DB::table('faculties')
            ->select($columns)
            ->leftJoin('educational_attainments', 'faculties.educational_attainment_id' , '=', 'educational_attainments.id')
            ->leftJoin('nature_of_appointments', 'faculties.nature_of_appointment_id' , '=', 'nature_of_appointments.id')
            ->whereNull('faculties.deleted_at');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('first_name')
            ->add('middle_name')
            ->add('last_name')
            ->add('educ_attain_name')
            ->add('nature_of_appointment_name')
            ->add('gender')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Middle name', 'middle_name')
                ->sortable()
                ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Nature of Appointment', 'nature_of_appointment_name')
                ->sortable()
                ->searchable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),
            Column::action('Action'),

        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('faculty-profile-update'))
                ->render(function ($role) {
                    return Blade::render(<<<HTML
                    <x-custom-button size="xs" color="yellow" href="{{ route('faculty.edit', ['id' => $role->id]) }}">Edit</x-custom-button>
                    HTML);
                }),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('faculty-profile-delete'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete:faculty', ['rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
