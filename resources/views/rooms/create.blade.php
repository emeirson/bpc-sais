<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Room']" />
    </section>
    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new room</h2>
            <form action="{{ route('rooms.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                    <div class="sm:col-span-1">
                        <x-form.label for="room_code" value="Room Code" />
                        <x-form.input type='text' id="room_code" name="room_code" value="{{ old('room_code') }}"
                            placeholder="Enter room code" />
                        <x-form.error for="room_code" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label for="description" value="Description" />
                        <x-form.input type='text' id="description" name="description"
                            value="{{ old('description') }}" placeholder="Enter description" />
                        <x-form.error for="description" />
                    </div>
                    <div class="sm:col-span-1">
                        <x-form.label for="capacity" value="Capacity" />
                        <x-form.input type='number' min='0' id="capacity" name="capacity"
                            value="{{ old('capacity') }}" placeholder="Enter capacity" />
                        <x-form.error for="capacity" />
                    </div>
                </div>
                <x-button.submit value="Add room" />
            </form>
        </div>
    </section>
</x-layout.app>
