<?php

namespace App\Livewire;

use App\Models\College;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CollegeTable extends PowerGridComponent
{
    public string $tableName = 'college-table-ydvtn5-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return College::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('college_code')
            ->add('description')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('College code', 'college_code')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(College $row): array
    {
        return [
            Button::add('edit')
                ->slot('&#9998;')
                ->id()
                ->class('pg-btn-white text-xs dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('colleges.edit', ['college' => $row->id]),
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
