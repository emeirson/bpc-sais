<x-layout.app>
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Department']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit: {{ $department->description }}</h2>
            <form action="{{ route('departments.update', $department) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="sm:col-span-3">
                        <x-form.label for="college_id" value="College" />
                        <select name="college_id" id="college_id"
                            class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                            @foreach ($colleges as $college)
                                <option @selected(old('college_id' == $college->id)) value="{{ $college->id }}">
                                    {{ $college->description }}</option>
                            @endforeach
                        </select>
                        <x-form.error for="college_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="department_code" value="Department Code" />
                        <x-form.input type='text' id="department_code" name="department_code"
                            value="{{ old('department_code', $department->department_code) }}"
                            placeholder="Enter department code" />
                        <x-form.error for="department_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description', $department->description) }}"
                            placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                </div>
                <x-button.submit value="Update department" />
            </form>
        </div>
    </section>
</x-layout.app>
