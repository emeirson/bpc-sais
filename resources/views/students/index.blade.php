<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Student']" />
        <div class="max-w-screen-6xl">
            <!-- Start coding here -->
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 mb-2">
                <x-button.create href="{{ route('students.create') }}" name="Add student" />
            </div>
            <livewire:students-table />
        </div>
    </section>

</x-layout.app>
