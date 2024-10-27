<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Department']" />
        <div class="max-w-screen-6xl">
            <!-- Start coding here -->
            <livewire:department-table />
        </div>
    </section>

</x-layout.app>
