<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'College']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new college</h2>
            <form action="{{ route('colleges.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="college_code" value="College Code" />
                        <x-form.input type='text' id="college_code" name="college_code"
                            value="{{ old('college_code') }}" placeholder="Enter college code" />
                        <x-form.error for="college_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description') }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                </div>
                <x-button.submit value="Add college" />
            </form>
        </div>
    </section>
</x-layout.app>
