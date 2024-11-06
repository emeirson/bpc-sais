<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Class']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-10">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editing: {{ $class->class_code }}</h2>
            <form action="{{ route('class-course.update', $class) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="class_code" value="Class Code" />
                        <x-form.input type='text' id="class_code" name="class_code"
                            value="{{ old('class_code', $class->class_code) }}" placeholder="Enter class code" />
                        <x-form.error for="class_code" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="semester_id" value="Term" />
                        <select name="semester_id" id="semester_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($terms as $term)
                                <option @selected(old('semester_id', $class->semester_id) == $term->id) value="{{ $term->id }}">
                                    {{ $term->details() }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="semester_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="course_id" value="Course" />
                        <select name="course_id" id="course_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($courses as $course)
                                <option @selected(old('course_id', $class->course_id) == $course->id) value="{{ $course->id }}">
                                    {{ $course->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="course_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="instructor_id" value="Instructor" />
                        <select name="instructor_id" id="instructor_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($instructors as $instructor)
                                <option @selected(old('instructor_id', $class->instructor_id) == $instructor->id) value="{{ $instructor->id }}">
                                    {{ $instructor->fullname() }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="instructor_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="room_id" value="Room" />
                        <select name="room_id" id="room_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($rooms as $room)
                                <option @selected(old('room_id', $class->room_id) == $room->id) value="{{ $room->id }}">
                                    {{ $room->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="room_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="start_time" value="Start Time" />
                        <x-form.input type='time' id="start_time" name="start_time"
                            value="{{ old('start_time', $class->start_time) }}" />
                        <x-form.error for="start_time" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="end_time" value="End Time" />
                        <x-form.input type='time' id="end_time" name="end_time"
                            value="{{ old('end_time', $class->end_time) }}" />
                        <x-form.error for="end_time" />
                    </div>
                </div>
                <x-button.submit value="Save changes" />
            </form>
        </div>
    </section>
    <section class="p-3">
        <livewire:class-course-student-table :class="$class" />
    </section>
</x-layout.app>
