<?php

namespace App\Livewire;

use App\Models\ClassCourse;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ClassCourseTable extends PowerGridComponent
{
    public string $tableName = 'class-course-table-n2wwbz-table';

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
        return ClassCourse::query()->with('course');
    }

    public function relationSearch(): array
    {
        return [
            'course' => [
                'description',
            ],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('class_code')
            ->add('course', fn($model) => $model->course->description)
            ->add('instructor', fn($model) => $model->instructor->fullname())
            ->add('semester', fn($model) => $model->semester->details())
            ->add('room', fn($model) => $model->room->description)
            ->add('start_time', fn($model) => Carbon::parse($model->start_time)->format('h:i A'))
            ->add('end_time', fn($model) => Carbon::parse($model->end_time)->format('h:i A'))
            ->add('created', fn($model) => Carbon::parse($model->created_at)->diffForHumans());
    }

    public function columns(): array
    {
        return [
            Column::make('Class code', 'class_code')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Course', 'course')
                ->sortable()
                ->searchable()
                ->bodyAttribute('text-sm text-gray-500'),

            Column::make('Semester', 'semester')
                ->bodyAttribute('text-sm text-gray-500'),

            Column::make('Instructor', 'instructor')
                ->bodyAttribute('text-sm text-gray-500'),

            Column::make('Room', 'room')
                ->bodyAttribute('text-sm text-gray-500'),

            Column::make('Start time', 'start_time')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('End time', 'end_time')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created')
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

    public function actions(ClassCourse $row): array
    {
        return [
            Button::add('edit')
                ->slot('&#9998;')
                ->class('pg-btn-white text-xs dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('class-course.edit', ['class_course' => $row->id]),
            Button::add('edit')
                ->slot('<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/></svg>')
                ->tooltip('View enrolled students')
                ->class('pg-btn-white text-xs dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('class-course.students', ['class_course' => $row->id]),
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
