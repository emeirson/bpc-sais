<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Program']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new program</h2>
            <form action="{{ route('programs.update', $program) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="sm:col-span-3">
                        <x-form.label for="department_id" value="Department" />
                        <select name="department_id" id="department_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($departments as $department)
                                <option @selected(old('department_id') == $program->department_id) value="{{ $department->id }}">{{ $department->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="department_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="program_code" value="Program Code" />
                        <x-form.input type='text' id="program_code" name="program_code"
                            value="{{ old('program_code', $program->program_code) }}" placeholder="Enter program code" />
                        <x-form.error for="program_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description', $program->description) }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                </div>
                <x-button.submit value="Update program" />
            </form>
        </div>
    </section>
</x-layout.app>
