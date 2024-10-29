<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'course']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit: {{ $course->description }}</h2>
            <form action="{{ route('courses.update', $course) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="course_code" value="Course Code" />
                        <x-form.input type='text' id="course_code" name="course_code"
                            value="{{ old('course_code', $course->course_code) }}" placeholder="Enter course code" />
                        <x-form.error for="course_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description', $course->course_code) }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="units" value="Units" />
                        <x-form.input type='number' id="units" name="units" min="0"
                            value="{{ old('units', $course->units) }}" placeholder="Enter number of units" />
                        <x-form.error for="units" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="lecture_hours" value="Lecture Hours" />
                        <x-form.input type='number' id="lecture_hours" name="lecture_hours" min="0"
                            value="{{ old('lecture_hours', $course->lecture_hours) }}" placeholder="Enter lecture hours" />
                        <x-form.error for="lecture_hours" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="laboratory_hours" value="Laboratory Hours" />
                        <x-form.input type='number' id="laboratory_hours" name="laboratory_hours" min="0"
                            value="{{ old('laboratory_hours', $course->laboratory_hours) }}" placeholder="Enter laboratory hours" />
                        <x-form.error for="laboratory_hours" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="prerequisite_course_id" value="Prerequisite/s" />
                        <select name="prerequisite_course_id" id="prerequisite_course_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            <option value="">NONE</option>
                            @foreach ($courses as $course)
                                <option @selected(old('prerequisite_course_id', $course->prerequisite_course_id)) value="{{ $course->id }}">
                                    {{ $course->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="prerequisite_course_id" />
                    </div>

                </div>
                <x-button.submit value="Update course" />
            </form>
        </div>
    </section>
</x-layout.app>
