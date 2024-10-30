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
            <div class="flex items-center space-x-3 w-full md:w-auto">
                <select wire:model.live="filterYear"
                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <option value="">- Filter by Year</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Fourth Year</option>
                    <option value="5">Fifth Year</option>
                </select>
            </div>
            <div class="flex items-center space-x-3 w-full md:w-auto">
                <select wire:model.live="filterSemester"
                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <option value="">- Filter by Semester</option>
                    <option value="first">First Semester</option>
                    <option value="second">Second Semester</option>
                    <option value="summer">Summer Class</option>
                </select>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto border">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <x-table.thead :headers="['#', 'code', 'name', 'units', 'lecture', 'laboratory', 'prerequisite']" />
            <tbody>

                @forelse ($courses as $course)
                    <tr class="border-b dark:border-gray-700" wire:key="course-{{ $course->id }}">

                        <x-table.data>
                            {{ $loop->index + 1 }}
                        </x-table.data>
                        <x-table.data>
                            {{ $course->course_code }}
                        </x-table.data>
                        <x-table.data>
                            {{ $course->description }}
                        </x-table.data>
                        <x-table.data>
                            {{ $course->units }}
                        </x-table.data>
                        <x-table.data>
                            {{ $course->lecture_hours }} hrs
                        </x-table.data>
                        <x-table.data>
                            {{ $course->laboratory_hours }} hrs
                        </x-table.data>
                        <x-table.data>
                            {{ $course->prerequisite ? $course->prerequisite->course_code : '' }}
                        </x-table.data>

                        <td class="px-4 py-3 flex items-center justify-end gap-x-2">
                            <button id="dropdown-button-{{ $loop->iteration }}"
                                data-dropdown-toggle="dropdown-{{ $loop->iteration }}"
                                wire:key="dropdown-button-{{ $course->id }}" data-dropdown-placement="top"
                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                            <div id="dropdown-{{ $loop->iteration }}" wire:key="dropdown-menu-{{ $course->id }}"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-button-{{ $loop->iteration }}">
                                    <li>
                                        <a href="{{ route('courses.show', $course->id) }}"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('courses.edit', $course->id) }}"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <form id="delete-form-{{ $loop->index }}"
                                        action="{{ route('courses.destroy', $course->id) }}" method="post">
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
        {{-- <x-table.pagination>{{ $courses->links() }} </x-table.pagination> --}}
    </div>
</div>
