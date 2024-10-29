<x-layout.app>
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Semester']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new semester</h2>
            <form action="{{ route('semesters.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6 mb-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="academic_year_id" value="Academic Year" />
                        <select name="academic_year_id" id="academic_year_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @forelse ($years as $year)
                                <option value="{{ $year->id }}">AY: {{ $year->start_year }}-{{ $year->end_year }}
                                </option>
                            @empty
                                <option>No Academic Year</option>
                            @endforelse
                        </select>
                        <div id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                            class="mt-1 text-blue-500 text-xs hover:text-blue-700 hover:cursor-pointer">
                            + Create new academic year
                        </div>
                        <x-form.error for="academic_year_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="name" value="Semester" />
                        <select name="name" id="name"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            <option @selected(old('name') == 'first-semester') value="first-semester">First Semester</option>
                            <option @selected(old('name') == 'second-semester') value="second-semester">Second Semester</option>
                            <option @selected(old('name') == 'summer-class') value="summer-class">Summer Class</option>
                        </select>
                        <x-form.error for="name" />
                    </div>
                </div>
                <x-button.submit value="Add Semester" />
            </form>
        </div>
    </section>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Academic Year
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('academic-years.store') }}" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                        <div class="sm:col-span-2">
                            <x-form.label for="start_year" value="Start" />
                            <x-form.input type='number' min="1900" max="{{ date('Y') + 1 }}" id="start_year"
                                name="start_year" placeholder="Enter start year" required />
                            <x-form.error for="start_year" />
                        </div>
                        <div class="sm:col-span-2">
                            <x-form.label for="end_year" value="End" />
                            <x-form.input type='number' min="1900" max="{{ date('Y') + 1 }}" id="end_year"
                                name="end_year" placeholder="Enter end year" required />
                            <x-form.error for="end_year" />
                        </div>
                    </div>
                    <x-button.submit value="Add Academic Year" />
                </form>
            </div>
        </div>
    </div>


</x-layout.app>
