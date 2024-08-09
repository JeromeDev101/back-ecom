<?php

namespace App\Livewire;

use App\Models\Faculty;
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

final class CertificationTable extends PowerGridComponent
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
        return DB::table('curriculum_certifications')->whereNull('curriculum_certifications.deleted_at');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('faculty_ids', function($data) {
                $faculties = json_decode($data->faculty_ids, true);
                if(is_array($faculties)) {
                    $html = '';
                    foreach($faculties as $id) {
                        $faculty = Faculty::find($id);
                        if($faculty){
                            $html .= '<x-badge type="green" label="'.$faculty->first_name.'" />';
                        }

                    }

                    return Blade::render($html);
                } else {
                    return $data->faculty_ids;
                }

            })
            ->add('type')
            ->add('date_held_formatted', fn ($model) => Carbon::parse($model->date_held)->format('d/m/Y'))
            ->add('deleted_at')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Faculty', 'faculty_ids')
                ->sortable()
                ->searchable(),

            Column::make('Type of Certifications', 'type')
                ->sortable()
                ->searchable(),

            Column::action('Action')

        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('date_held'),
        ];
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('curriculum-update'))
                ->render(function ($role) {
                    return Blade::render(<<<HTML
                    <x-custom-button size="xs" color="yellow" href="{{ route('curriculum-national-tvet.edit', ['id' => $role->id]) }}">Edit</x-custom-button>
                    HTML);
                }),

            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->can(allowed: auth()->user()->hasPermissionTo('curriculum-delete'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('delete:certification', ['rowId' => $row->id]),
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
