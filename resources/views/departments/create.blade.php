<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Department']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new department</h2>
            <form action="{{ route('departments.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="department_code" value="Department Code" />
                        <x-form.input type='text' id="department_code" name="department_code"
                            value="{{ old('department_code') }}" placeholder="Enter department code" />
                        <x-form.error for="department_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description') }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                </div>
                <x-button.submit value="Add department" />
            </form>
        </div>
    </section>
</x-layout.app>
