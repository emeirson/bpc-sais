<x-layout.app>
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Instructor']" />
    </section>

    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit: {{ $instructor->fullname() }}</h2>
            <form action="{{ route('instructors.update', $instructor) }}" method="post">
                @csrf
                @method('PATCh')
                <div id="accordion-collapse" data-accordion="open">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                            aria-controls="accordion-collapse-body-1">
                            <span>Personal Information</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                                <div class="sm:col-span-full">
                                    <x-form.label for="department_id" value="Department" />
                                    <select name="department_id" id="department_id"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        @foreach ($departments as $department)
                                            <option value="{{ old('department_id', $instructor->department_id) }}">
                                                {{ $department->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="lastname" value="Lastname" />
                                    <x-form.input type='text' id="lastname" name="lastname"
                                        value="{{ old('lastname', $instructor->lastname) }}"
                                        placeholder="Enter lastname" />
                                    <x-form.error for="lastname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="firstname" value="Firstname" />
                                    <x-form.input type='text' id="firstname" name="firstname"
                                        value="{{ old('firstname', $instructor->firstname) }}"
                                        placeholder="Enter firstname" />
                                    <x-form.error for="firstname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="middlename" value="Middlename" />
                                    <x-form.input type='text' id="middlename" name="middlename"
                                        value="{{ old('middlename', $instructor->middlename) }}"
                                        placeholder="Enter middlename" />
                                    <x-form.error for="middlename" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="salutation" value="Salutation" />
                                    <x-form.input type='text' id="salutation" name="salutation"
                                        value="{{ old('salutation', $instructor->salutation) }}"
                                        placeholder="Enter sa" />
                                    <x-form.error for="salutation" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="sex" value="Sex" />
                                    <select name="sex" id="sex"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="male" @selected(old('sex', $instructor->sex) == 'male')>Male</option>
                                        <option value="female" @selected(old('sex', $instructor->sex) == 'female')>Female</option>
                                    </select>
                                    <x-form.error for="sex" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="birthdate" value="Birthdate" />
                                    <x-form.input type='date' id="birthdate" name="birthdate"
                                        value="{{ old('birthdate', $instructor->birthdate) }}" />
                                    <x-form.error for="birthdate" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="barangay" value="Barangay" />
                                    <x-form.input type='text' id="barangay" name="barangay"
                                        value="{{ old('barangay', $instructor->barangay) }}"
                                        placeholder="Enter barangay" />
                                    <x-form.error for="barangay" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="town" value="Town" />
                                    <x-form.input type='text' id="town" name="town"
                                        value="{{ old('town', $instructor->town) }}" placeholder="Enter town" />
                                    <x-form.error for="town" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="province" value="Province" />
                                    <x-form.input type='text' id="province" name="province"
                                        value="{{ old('province', $instructor->province) }}"
                                        placeholder="Enter province" />
                                    <x-form.error for="province" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="professional_no" value="Professional No." />
                                    <x-form.input type='text' id="professional_no" name="professional_no"
                                        placeholder="Enter professional no."
                                        value="{{ old('professional_no', $instructor->professional_no) }}" />
                                    <x-form.error for="professional_no" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="appointment_nature" value="Appointment nature" />
                                    <select name="appointment_nature" id="appointment_nature"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="permanent" @selected(old('appointment_nature', $instructor->appointment_nature) == 'permanent')>Permanent</option>
                                    </select>
                                    <x-form.error for="appointment_nature" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="employment_status" value="Employment Status" />
                                    <select name="employment_status" id="employment_status"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="part-time" @selected(old('employment_status', $instructor->employment_status) == 'part-time')>Part-Time</option>
                                        <option value="full-time" @selected(old('employment_status', $instructor->employment_status) == 'full-time')>Full-Time</option>
                                    </select>
                                    <x-form.error for="employment_status" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="date_hired" value="Date Hired" />
                                    <x-form.input type='date' id="date_hired" name="date_hired"
                                        value="{{ old('date_hired', $instructor->date_hired) }}" />
                                    <x-form.error for="date_hired" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-button.submit value="Update instructor" />
            </form>
        </div>
    </section>
</x-layout.app>
