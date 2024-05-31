<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ProductTable extends PowerGridComponent
{
    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }

    public function template(): ?string
    {
        return \App\PowerGridThemes\CustomTheme::class;
    }
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('products');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('code')
            ->add('description')
            ->add('price')
            ->add('quantity')
            ->add('image_path', fn ($item) => '<img class="w-8 h-8 shrink-0 grow-0 rounded-full" src="' . $item->image_path . '">');
    }

    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot('Delete Selected (<span x-text="window.pgBulkActions.count(\'' . $this->tableName . '\')"></span>)')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('bulkDelete.' . $this->tableName, []),
        ];
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {

        // dd($this->tableName);
        // $this->js('alert(window.pgBulkActions.get(\'' . $this->tableName . '\'))');
        dd(Category::all());

    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Code', 'code')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Price', 'price')
                ->sortable()
                ->searchable(),

            Column::make('Quantity', 'quantity')
                ->sortable()
                ->searchable(),

            Column::make('Image', 'image_path'),
            Column::action('Action')
                ->title('Actions'),

        ];
    }

    public function filters(): array
    {
        return [
            // Filter::inputText('name')
            //     ->placeholder('Name')
            //     ->operators(['contains', 'starts_with', 'ends_with']),
            // Filter::inputText('code')
            //     ->placeholder('Code')
            //     ->operators(['contains', 'starts_with', 'ends_with']),
            Filter::multiSelect('name', 'id')
                ->dataSource(Category::all())
                ->optionValue('id')
                ->optionLabel('Category'),
        ];
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('products.edit', ['id' => $row->id])
        ];
    }


    // public function actionRules($row): array
    // {
    //    return [
    //         // Hide button edit for ID 1
    //         Rule::button('edit')
    //             ->when(fn($row) => $row->id === 1)
    //             ->hide(),
    //     ];
    // }

}
