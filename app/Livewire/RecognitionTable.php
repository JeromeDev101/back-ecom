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

final class RecognitionTable extends PowerGridComponent
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
            'student_recognitions.*',
            'programs.name as program_name'
        ];

        return DB::table('student_recognitions')
            ->select($columns)
            ->leftJoin('programs', 'student_recognitions.program_id', '=', 'programs.id')
            ->whereNull('student_recognitions.deleted_at');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name_of_award')
            ->add('date_awarded_formatted', fn ($model) => Carbon::parse($model->date_awarded)->format('d/m/Y'))
            ->add('institution')
            ->add('grantee_name')
            ->add('medal_type')
            ->add('program_id')
            ->add('deleted_at')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name of award', 'name_of_award')
                ->sortable()
                ->searchable(),

            Column::make('Date awarded', 'date_awarded_formatted', 'date_awarded')
                ->sortable(),

            Column::make('Institution', 'institution')
                ->sortable()
                ->searchable(),

            Column::make('Grantee name', 'grantee_name')
                ->sortable()
                ->searchable(),

            Column::make('Medal type', 'medal_type')
                ->sortable()
                ->searchable(),

            Column::make('Program', 'program_name')
                ->sortable()
                ->searchable(),

            Column::action('Action'),

        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('student-profile-update'))
                ->render(function ($role) {
                    return Blade::render(<<<HTML
                    <x-custom-button size="xs" color="yellow" href="{{ route('awards.edit', ['id' => $role->id]) }}">Edit</x-custom-button>
                    HTML);
                }),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('student-profile-delete'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete:recognition', ['rowId' => $row->id]),
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
