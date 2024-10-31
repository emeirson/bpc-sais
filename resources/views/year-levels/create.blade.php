<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Year Level']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new year level</h2>
            <form action="{{ route('year-levels.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="name" value="Level name" />
                        <x-form.input type='text' id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter level name" />
                        <x-form.error for="name" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="order" value="Order" />
                        <x-form.input type='number' id="order" name="order" value="{{ old('order') }}"
                            placeholder="Enter level order" />
                        <x-form.error for="order" />
                    </div>
                </div>
                <x-button.submit value="Add year level" />
            </form>
        </div>
    </section>
</x-layout.app>
