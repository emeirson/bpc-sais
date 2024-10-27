<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Program']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-10">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ $program->description }}</h2>
            <form action="{{ route('program-courses.update', $program) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-2">
                        <x-form.label for="course_id" value="Course List" />
                        <x-form.dropdown :collections="$courses" name="course_id" column="course_id"
                            placeholder="Select Course" display="description" />
                        <x-form.error for="course_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="year_level" value="Year" />
                        <select name="year_level" id="year_level"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select year level</option>
                            <option @selected(old('year_level') == '1') value="1">1ST YEAR</option>
                            <option @selected(old('year_level') == '2') value="2">2ND YEAR</option>
                            <option @selected(old('year_level') == '3') value="3">3RD YEAR</option>
                            <option @selected(old('year_level') == '4') value="4">4TH YEAR</option>
                            <option @selected(old('year_level') == '5') value="5">5TH YEAR</option>
                        </select>
                        <x-form.error for="year_level" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="semester" value="Semester" />
                        <select name="semester" id="semester"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select semester</option>
                            <option @selected(old('semester') == 'first') value="first">FIRST SEMESTER</option>
                            <option @selected(old('semester') == 'second') value="second">SECOND SEMESTER</option>
                            <option @selected(old('semester') == 'summer') value="summer">SUMMER CLASS</option>
                        </select>
                        <x-form.error for="semester" />
                    </div>
                </div>
                <x-button.submit value="Add course" />
            </form>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <div class="max-w-screen-6xl">
            <livewire:program-courses-table :courses="$program->courses" />
        </div>
    </section>
</x-layout.app>
