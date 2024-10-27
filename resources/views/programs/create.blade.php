<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Program']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new program</h2>
            <form action="{{ route('programs.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="sm:col-span-3">
                        <x-form.label for="department_id" value="Department" />
                        <x-form.dropdown :collections="$departments" name="department_id" column="department_id"
                            placeholder="Select Department" display="description" />
                        <x-form.error for="department_id" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="program_code" value="Program Code" />
                        <x-form.input type='text' id="program_code" name="program_code"
                            value="{{ old('program_code') }}" placeholder="Enter program code" />
                        <x-form.error for="program_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description') }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                </div>
                <x-button.submit value="Add program" />
            </form>
        </div>
    </section>
</x-layout.app>
