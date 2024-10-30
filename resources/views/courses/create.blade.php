<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Course']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new course</h2>
            <form action="{{ route('courses.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <x-form.label for="college_id" value="College" />
                        <select name="college_id" id="college_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($colleges as $college)
                                <option @selected(old('college_id') == $college->id) value="{{ $college->id }}">
                                    {{ $college->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="college_id" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="department_id" value="Department" />
                        <select name="department_id" id="department_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($departments as $department)
                                <option @selected(old('department_id') == $department->id) value="{{ $department->id }}">
                                    {{ $department->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="department_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="course_code" value="Course Code" />
                        <x-form.input type='text' id="course_code" name="course_code"
                            value="{{ old('course_code') }}" placeholder="Enter course code" />
                        <x-form.error for="course_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description') }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="units" value="Units" />
                        <x-form.input type='number' id="units" name="units" min="1"
                            value="{{ old('units') }}" placeholder="Enter number of units" />
                        <x-form.error for="units" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="lecture_hours" value="Lecture Hours" />
                        <x-form.input type='text' id="lecture_hours" name="lecture_hours" min="1"
                            value="{{ old('lecture_hours') }}" placeholder="Enter lecture hours" />
                        <x-form.error for="lecture_hours" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="laboratory_hours" value="Laboratory Hours" />
                        <x-form.input type='text' id="laboratory_hours" name="laboratory_hours" min="1"
                            value="{{ old('laboratory_hours') }}" placeholder="Enter laboratory hours" />
                        <x-form.error for="laboratory_hours" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="prerequisite_course_id" value="Prerequisite/s" />
                        <x-form.dropdown :collections="$courses" name="prerequisite_course_id" column="id"
                            placeholder="Select Course" display="description" />
                        <x-form.error for="prerequisite_course_id" />
                    </div>

                </div>
                <x-button.submit value="Add course" />
            </form>
        </div>
    </section>
</x-layout.app>
