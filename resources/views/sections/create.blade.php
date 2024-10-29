<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Section']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new section</h2>
            <form action="{{ route('sections.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-4">
                        <x-form.label for="semester_id" value="Semester" />
                        <select name="semester_id" id="semester_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @forelse ($semesters as $semester)
                                <option value="{{ $semester->id }}">
                                    {{ $semester->details() }}
                                </option>
                            @empty
                                <option>No Academic semester</option>
                            @endforelse
                        </select>
                        <x-form.error for="semester_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="section_code" value="Code" />
                        <x-form.input type='text' id="section_code" name="section_code"
                            value="{{ old('section_code') }}" placeholder="Enter section code" />
                        <x-form.error for="section_code" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="year_level" value="Year" />
                        <x-form.input type='number' min="1" id="year_level" name="year_level"
                            value="{{ old('year_level') }}" placeholder="Enter year level" />
                        <x-form.error for="year_level" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="section" value="Section" />
                        <x-form.input type='number' min="1" id="section" name="section"
                            value="{{ old('section') }}" placeholder="Enter section number" />
                        <x-form.error for="section" />
                    </div>
                </div>
                <x-button.submit value="Add college" />
            </form>
        </div>
    </section>
</x-layout.app>
