<div class="bg-white dark:bg-gray-800 relative overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" wire:model.live="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search" required="">
                </div>
            </form>
        </div>
        <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <x-button.default name="Add student" id="defaultModalButton" data-modal-target="defaultModal"
                data-modal-toggle="defaultModal" />
            <div class="flex items-center space-x-3 w-full md:w-auto">

            </div>
        </div>
    </div>
    <div class="overflow-x-auto border">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <x-table.thead :headers="['#', 'student id', 'fullname', 'email', 'mobile number', 'birthdate', 'sex']" />
            <tbody>

                @forelse ($students as $student)
                    <tr class="border-b dark:border-gray-700" wire:key="student-{{ $student->id }}">

                        <x-table.data>
                            {{ $loop->iteration }}
                        </x-table.data>
                        <x-table.data>
                            {{ $student->student_code }}
                        </x-table.data>
                        <x-table.data>
                            {{ $student->fullname() }}
                        </x-table.data>
                        <x-table.data>
                            {{ $student->email }}
                        </x-table.data>
                        <x-table.data>
                            {{ $student->mobile_number }}
                        </x-table.data>
                        <x-table.data>
                            {{ $student->birthdate }}
                        </x-table.data>
                        <x-table.data>
                            {{ strtoupper($student->sex) }}
                        </x-table.data>

                        <td class="px-4 py-3 flex items-center justify-end gap-x-2">
                            <button id="dropdown-button-{{ $loop->iteration }}"
                                data-dropdown-toggle="dropdown-{{ $loop->iteration }}"
                                wire:key="dropdown-button-{{ $student->id }}" data-dropdown-placement="top"
                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                            <div id="dropdown-{{ $loop->iteration }}" wire:key="dropdown-menu-{{ $student->id }}"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-button-{{ $loop->iteration }}">
                                    <li>
                                        <a href="{{ route('students.show', $student->id) }}"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <form id="delete-form-{{ $loop->index }}"
                                        action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                    </form>
                                    <x-button.delete
                                        onclick="return confirm('Are you sure you want to delete this item?')"
                                        form="delete-form-{{ $loop->index }}" name="Delete" />
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">

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
                <form action="#">
                    <div class="grid gap-4 mb-4">
                        <div class="sm:col-span-1">
                            <x-form.label for="student_number" value="Student Number" />
                            <x-form.input type='text' id="student_number" name="student_number" required
                                value="{{ old('student_number') }}" placeholder="Enter student number" />
                            <x-form.error for="student_number" />
                        </div>
                    </div>
                    <x-button.submit value="Add student" />
                </form>
            </div>
        </div>
    </div>
</div>
