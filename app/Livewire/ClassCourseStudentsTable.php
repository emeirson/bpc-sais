<?php

namespace App\Livewire;

use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ClassCourseStudentsTable extends PowerGridComponent
{
    public string $tableName = 'class-course-students-table-r1fg9g-table';

    public $class_course;

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
        $class_id = $this->class_course->id;
        return Student::query()
            ->whereHas('enrollments', function ($query) use ($class_id) {
                $query->where('class_course_id', $class_id);
            });
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
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Student code', 'student_code')
                ->sortable()
                ->searchable(),

            Column::make('Lastname', 'lastname')
                ->sortable()
                ->searchable(),

            Column::make('Firstname', 'firstname')
                ->sortable()
                ->searchable(),

            Column::make('Middlename', 'middlename')
                ->sortable()
                ->searchable(),

            Column::make('Name extension', 'name_extension')
                ->sortable()
                ->searchable(),

            Column::make('Barangay', 'barangay')
                ->sortable()
                ->searchable(),

            Column::make('Town', 'town')
                ->sortable()
                ->searchable(),

            Column::make('Province', 'province')
                ->sortable()
                ->searchable(),

            Column::make('Birthdate', 'birthdate_formatted', 'birthdate')
                ->sortable(),

            Column::make('Birthplace', 'birthplace')
                ->sortable()
                ->searchable(),

            Column::make('Sex', 'sex')
                ->sortable()
                ->searchable(),

            Column::make('Civil status', 'civil_status')
                ->sortable()
                ->searchable(),

            Column::make('Religion', 'religion')
                ->sortable()
                ->searchable(),

            Column::make('Mother tongue', 'mother_tongue')
                ->sortable()
                ->searchable(),

            Column::make('Citizenship', 'citizenship')
                ->sortable()
                ->searchable(),

            Column::make('Mobile number', 'mobile_number')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Father lastname', 'father_lastname')
                ->sortable()
                ->searchable(),

            Column::make('Father firstname', 'father_firstname')
                ->sortable()
                ->searchable(),

            Column::make('Father middlename', 'father_middlename')
                ->sortable()
                ->searchable(),

            Column::make('Father education', 'father_education')
                ->sortable()
                ->searchable(),

            Column::make('Father address', 'father_address')
                ->sortable()
                ->searchable(),

            Column::make('Father mobile number', 'father_mobile_number')
                ->sortable()
                ->searchable(),

            Column::make('Mother lastname', 'mother_lastname')
                ->sortable()
                ->searchable(),

            Column::make('Mother firstname', 'mother_firstname')
                ->sortable()
                ->searchable(),

            Column::make('Mother middlename', 'mother_middlename')
                ->sortable()
                ->searchable(),

            Column::make('Mother education', 'mother_education')
                ->sortable()
                ->searchable(),

            Column::make('Mother address', 'mother_address')
                ->sortable()
                ->searchable(),

            Column::make('Mother mobile number', 'mother_mobile_number')
                ->sortable()
                ->searchable(),

            Column::make('Beneficiary 4ps', 'beneficiary_4ps')
                ->sortable()
                ->searchable(),

            Column::make('School name', 'school_name')
                ->sortable()
                ->searchable(),

            Column::make('School address', 'school_address')
                ->sortable()
                ->searchable(),

            Column::make('Honors received', 'honors_received')
                ->sortable()
                ->searchable(),

            Column::make('Year graduated', 'year_graduated')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('birthdate'),
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
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
