<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class StudentEnrollmentTable extends PowerGridComponent
{
    public string $tableName = 'student-enrollment-table-awaub1-table';

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
        return Student::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('student_code')
            ->add('lastname')
            ->add('firstname')
            ->add('middlename')
            ->add('fullname', fn($model) =>  $model->fullname())
            ->add('name_extension')
            ->add('barangay')
            ->add('town')
            ->add('province')
            ->add('birthdate_formatted', fn(Student $model) => Carbon::parse($model->birthdate)->format('d/m/Y'))
            ->add('birthplace')
            ->add('sex')
            ->add('civil_status')
            ->add('religion')
            ->add('mother_tongue')
            ->add('citizenship')
            ->add('mobile_number')
            ->add('email')
            ->add('father_lastname')
            ->add('father_firstname')
            ->add('father_middlename')
            ->add('father_education')
            ->add('father_address')
            ->add('father_mobile_number')
            ->add('mother_lastname')
            ->add('mother_firstname')
            ->add('mother_middlename')
            ->add('mother_education')
            ->add('mother_address')
            ->add('mother_mobile_number')
            ->add('beneficiary_4ps')
            ->add('school_name')
            ->add('school_address')
            ->add('honors_received')
            ->add('year_graduated')
            ->add('created', fn($model) => Carbon::parse($model->created_at)->diffForHumans());
    }

    public function columns(): array
    {
        return [
            Column::make('Student code', 'student_code')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Full Name', 'fullname')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable(),

            Column::make('Birthdate', 'birthdate_formatted', 'birthdate')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable(),

            Column::make('Mobile number', 'mobile_number')
                ->bodyAttribute('text-sm text-gray-500')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
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

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Student $row): array
    {
        return [
            Button::add('edit')
                ->slot('Enrollment')
                ->id()
                ->class('pg-btn-white text-xs dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('enrollment.create', ['student' => $row->id]),
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
