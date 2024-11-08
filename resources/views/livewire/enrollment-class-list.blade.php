<div class="bg-white dark:bg-gray-800 relative overflow-hidden">
    <div class="grid gap-4 sm:grid-cols-4 sm:gap-6 my-4">
        <div class="sm:col-span-1">
            <x-form.label for="section_id" value="Select Block Section" />
            <select name="section_id" id="section_id" wire:model.live="selected_section"
                class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                <option value="">--------</option>
                @foreach ($sections as $section)
                    <option @selected(old('section_id') == $section->id) value="{{ $section->id }}">
                        {{ $section->section_code }}</option>
                @endforeach
            </select>
            <x-form.error for="section_id" />
        </div>
    </div>
    <div class="overflow-x-auto border">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <x-table.thead :headers="['status', 'class code', 'course', 'instructor', 'room', 'schedule', 'units']" />
            <tbody>
                <form action="{{ route('enrollment.store', $student) }}" id="courseList" method="post">
                    @csrf
                    @forelse ($classes as $class)
                        <tr class="border-b dark:border-gray-700" wire:key="{{ $class->id }}">
                            <x-table.data>
                                <input id="checkbox" type="checkbox" name="classes[]" checked
                                    value="{{ $class->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </x-table.data>
                            <x-table.data>
                                {{ $class->class_code }}
                            </x-table.data>
                            <x-table.data>
                                {{ $class->course->description }}
                            </x-table.data>
                            <x-table.data>
                                {{ $class->instructor->fullname() }}
                            </x-table.data>
                            <x-table.data>
                                {{ $class->room->description }}
                            </x-table.data>
                            <x-table.data>
                                {{ $class->getTime() }}
                            </x-table.data>
                            <x-table.data>
                                {{ $class->course->units }}.0
                            </x-table.data>
                        </tr>
                    @empty

                    @endforelse
                </form>
                <tr class="border-b dark:border-gray-700">
                    <x-table.data>
                        <button class="border rounded-sm hover:bg-blue-100 py-1 px-2.5 flex items-center gap-x-2">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                            </svg>
                        </button>
                    </x-table.data>
                </tr>
            </tbody>
        </table>
    </div>
    <x-button.submit form="courseList" value="Save all for addition" />
</div>
