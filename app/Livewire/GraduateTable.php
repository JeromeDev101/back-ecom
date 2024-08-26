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

final class GraduateTable extends PowerGridComponent
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
            'student_graduates.*',
            'programs.name as program_name'
        ];

        return DB::table('student_graduates')->select($columns)
                ->leftJoin('programs', 'student_graduates.program_id', '=', 'programs.id')
                ->whereNull('student_graduates.deleted_at');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('program_id')
            ->add('program_name')
            ->add('num_student')
            ->add('sy1')
            ->add('sy2')
            ->add('graduation_date', fn ($foreign) => Carbon::parse($foreign->graduation_date)->format('F j, Y'))
            ->add('sy', fn ($foreign) => $foreign->sy1.'-'.$foreign->sy2)
            ->add('semester', fn ($student) => $student->semester == '1' ? '1st':'2nd')
            ->add('deleted_at')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Program', 'program_name')
                ->sortable()
                ->searchable(),

            Column::make('Num student', 'num_student')
                ->sortable()
                ->searchable(),

            Column::make('School Year', 'sy')
                ->sortable()
                ->searchable(),

            Column::make('Semester', 'semester')
                ->sortable()
                ->searchable(),

            Column::make('Graduation date', 'graduation_date')
                ->sortable()
                ->searchable(),

            Column::action('Action')

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
                    <x-custom-button size="xs" color="yellow" href="{{ route('graduates.edit', ['id' => $role->id]) }}">Edit</x-custom-button>
                    HTML);
                }),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('student-profile-delete'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete:graduate', ['rowId' => $row->id]),
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
