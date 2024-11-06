<x-layout.app>

    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5">
        <x-shared.breadcrump :menu="['Management', 'Student']" />
    </section>

    <section class="bg-white dark:bg-gray-900 pb-20">
        <div class="px-8 max-w-6xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new student</h2>
            <form action="{{ route('students.store') }}" method="post">
                @csrf
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
                                <div class="sm:col-span-1">
                                    <x-form.label for="lastname" value="Lastname" />
                                    <x-form.input type='text' id="lastname" name="lastname"
                                        value="{{ old('lastname') }}" placeholder="Enter lastname" />
                                    <x-form.error for="lastname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="firstname" value="Firstname" />
                                    <x-form.input type='text' id="firstname" name="firstname"
                                        value="{{ old('firstname') }}" placeholder="Enter firstname" />
                                    <x-form.error for="firstname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="middlename" value="Middlename" />
                                    <x-form.input type='text' id="middlename" name="middlename"
                                        value="{{ old('middlename') }}" placeholder="Enter middlename" />
                                    <x-form.error for="middlename" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="name_extension" value="Name Extension" />
                                    <x-form.input type='text' id="name_extension" name="name_extension"
                                        value="{{ old('name_extension') }}" placeholder="Enter name extension" />
                                    <x-form.error for="name_extension" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="barangay" value="Barangay" />
                                    <x-form.input type='text' id="barangay" name="barangay"
                                        value="{{ old('barangay') }}" placeholder="Enter barangay" />
                                    <x-form.error for="barangay" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="town" value="Town" />
                                    <x-form.input type='text' id="town" name="town"
                                        value="{{ old('town') }}" placeholder="Enter town" />
                                    <x-form.error for="town" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="province" value="Province" />
                                    <x-form.input type='text' id="province" name="province"
                                        value="{{ old('province') }}" placeholder="Enter province" />
                                    <x-form.error for="province" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="birthdate" value="Birthdate" />
                                    <x-form.input type='date' id="birthdate" name="birthdate"
                                        value="{{ old('birthdate') }}" />
                                    <x-form.error for="birthdate" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="birthplace" value="Place of Birth" />
                                    <x-form.input type='text' id="birthplace" name="birthplace"
                                        value="{{ old('birthplace') }}" placeholder="Enter birthplace" />
                                    <x-form.error for="birthplace" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="sex" value="Sex" />
                                    <select name="sex" id="sex"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="">Select Sex</option>
                                        <option value="male" @selected(old('sex') == 'male')>Male</option>
                                        <option value="female" @selected(old('sex') == 'female')>Female</option>
                                    </select>
                                    <x-form.error for="sex" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="civil_status" value="Civil Status" />
                                    <select name="civil_status" id="civil_status"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="">Select civil status</option>
                                        <option value="single" @selected(old('civil_status') == 'single')>Single</option>
                                        <option value="married" @selected(old('civil_status') == 'married')>Married</option>
                                        <option value="widowed" @selected(old('civil_status') == 'widowed')>Widowed</option>
                                        <option value="separated" @selected(old('civil_status') == 'separated')>Separated</option>
                                        <option value="solo parent" @selected(old('civil_status') == 'solo parent')>Solo Parent</option>
                                    </select>
                                    <x-form.error for="civil_status" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="religion" value="Religion" />
                                    <x-form.input type='text' id="religion" name="religion"
                                        value="{{ old('religion') }}" placeholder="Enter religion" />
                                    <x-form.error for="religion" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_tongue" value="Mother Tongue" />
                                    <x-form.input type='text' id="mother_tongue" name="mother_tongue"
                                        value="{{ old('mother_tongue') }}" placeholder="Enter mother tongue" />
                                    <x-form.error for="mother_tongue" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="citizenship" value="Citizenship" />
                                    <x-form.input type='text' id="citizenship" name="citizenship"
                                        value="{{ old('citizenship') }}" placeholder="Enter citizenship" />
                                    <x-form.error for="citizenship" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mobile_number" value="Mobile Number" />
                                    <x-form.input type='text' id="mobile_number" name="mobile_number"
                                        value="{{ old('mobile_number') }}" placeholder="Enter mobile number" />
                                    <x-form.error for="mobile_number" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="email" value="Email" />
                                    <x-form.input type='email' id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter email" />
                                    <x-form.error for="email" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="true"
                            aria-controls="accordion-collapse-body-2">
                            <span>Family Background</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden"
                        aria-labelledby="accordion-collapse-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <h2 class="mb-4 font-bold uppercase text-gray-600 dark:text-white">Father / Guardian</h2>
                            <div class="pl-4 grid gap-4 sm:grid-cols-4 sm:gap-6 my-8">
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_lastname" value="Lastname" />
                                    <x-form.input type='text' id="father_lastname" name="father_lastname"
                                        value="{{ old('father_lastname') }}" placeholder="Enter lastname" />
                                    <x-form.error for="father_lastname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_firstname" value="Firstname" />
                                    <x-form.input type='text' id="father_firstname" name="father_firstname"
                                        value="{{ old('father_firstname') }}" placeholder="Enter firstname" />
                                    <x-form.error for="father_firstname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_middlename" value="Middlename" />
                                    <x-form.input type='text' id="father_middlename" name="father_middlename"
                                        value="{{ old('father_middlename') }}" placeholder="Enter middlename" />
                                    <x-form.error for="father_middlename" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_occupation" value="Occupation" />
                                    <x-form.input type='text' id="father_occupation" name="father_occupation"
                                        value="{{ old('father_occupation') }}" placeholder="Enter occupation" />
                                    <x-form.error for="father_occupation" />
                                </div>
                                <div class="sm:col-span-2">
                                    <x-form.label for="father_address" value="Address" />
                                    <x-form.input type='text' id="father_address" name="father_address"
                                        value="{{ old('father_address') }}" placeholder="Enter address" />
                                    <x-form.error for="father_address" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_mobile_number" value="Mobile Number" />
                                    <x-form.input type='text' id="father_mobile_number"
                                        name="father_mobile_number" value="{{ old('father_mobile_number') }}"
                                        placeholder="Enter mobile number" />
                                    <x-form.error for="father_mobile_number" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="father_education" value="Highest Educational Attainment" />
                                    <select name="father_education" id="father_education"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="">Select Highest Educational Attainment</option>
                                        <option value="Elementary Graduate" @selected(old('highest_educational_attainment') == 'Elementary Graduate')>Elementary
                                            Graduate</option>
                                        <option value="High School Graduate" @selected(old('highest_educational_attainment') == 'High School Graduate')>High School
                                            Graduate</option>
                                        <option value="College Graduate" @selected(old('highest_educational_attainment') == 'College Graduate')>College Graduate
                                        </option>
                                        <option value="Master's Graduate" @selected(old('highest_educational_attainment') == "Master's Graduate")>Master's
                                            Graduate</option>
                                        <option value="Doctorate Graduate" @selected(old('highest_educational_attainment') == 'Doctorate Graduate')>Doctorate
                                            Graduate</option>
                                    </select>
                                    <x-form.error for="father_education" />
                                </div>
                            </div>
                            <h2 class="mb-4 font-bold uppercase text-gray-600 dark:text-white">Mother / Guardian</h2>
                            <div class="pl-4 grid gap-4 sm:grid-cols-4 sm:gap-6 my-8">
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_lastname" value="Lastname" />
                                    <x-form.input type='text' id="mother_lastname" name="mother_lastname"
                                        value="{{ old('mother_lastname') }}" placeholder="Enter lastname" />
                                    <x-form.error for="mother_lastname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_firstname" value="Firstname" />
                                    <x-form.input type='text' id="mother_firstname" name="mother_firstname"
                                        value="{{ old('mother_firstname') }}" placeholder="Enter firstname" />
                                    <x-form.error for="mother_firstname" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_middlename" value="Middlename" />
                                    <x-form.input type='text' id="mother_middlename" name="mother_middlename"
                                        value="{{ old('mother_middlename') }}" placeholder="Enter middlename" />
                                    <x-form.error for="mother_middlename" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_occupation" value="Occupation" />
                                    <x-form.input type='text' id="mother_occupation" name="mother_occupation"
                                        value="{{ old('mother_occupation') }}" placeholder="Enter occupation" />
                                    <x-form.error for="mother_occupation" />
                                </div>
                                <div class="sm:col-span-2">
                                    <x-form.label for="mother_address" value="Address" />
                                    <x-form.input type='text' id="mother_address" name="mother_address"
                                        value="{{ old('mother_address') }}" placeholder="Enter address" />
                                    <x-form.error for="mother_address" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_mobile_number" value="Mobile Number" />
                                    <x-form.input type='text' id="mother_mobile_number"
                                        name="mother_mobile_number" value="{{ old('mother_mobile_number') }}"
                                        placeholder="Enter mobile number" />
                                    <x-form.error for="mother_mobile_number" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="mother_education" value="Highest Educational Attainment" />
                                    <select name="mother_education" id="mother_education"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="">Select Highest Educational Attainment</option>
                                        <option value="Elementary Graduate" @selected(old('highest_educational_attainment') == 'Elementary Graduate')>Elementary
                                            Graduate</option>
                                        <option value="High School Graduate" @selected(old('highest_educational_attainment') == 'High School Graduate')>High School
                                            Graduate</option>
                                        <option value="College Graduate" @selected(old('highest_educational_attainment') == 'College Graduate')>College Graduate
                                        </option>
                                        <option value="Master's Graduate" @selected(old('highest_educational_attainment') == "Master's Graduate")>Master's
                                            Graduate</option>
                                        <option value="Doctorate Graduate" @selected(old('highest_educational_attainment') == 'Doctorate Graduate')>Doctorate
                                            Graduate</option>
                                    </select>
                                    <x-form.error for="father_education" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="beneficiary_4ps" value="4ps Beneficiary" />
                                    <select name="beneficiary_4ps" id="beneficiary_4ps"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        <option value="">Select</option>
                                        <option value="1" @selected(old('beneficiary_4ps') == '1')>Yes</option>
                                        <option value="0" @selected(old('beneficiary_4ps') == '0')>No</option>
                                    </select>
                                    <x-form.error for="beneficiary_4ps" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-3" aria-expanded="true"
                            aria-controls="accordion-collapse-body-3">
                            <span>Academic Information (Last School Attended)</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden"
                        aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                                <div class="sm:col-span-full">
                                    <x-form.label for="school_name" value="School Name" />
                                    <x-form.input type='text' id="school_name" name="school_name"
                                        value="{{ old('school_name') }}" placeholder="Enter school name" />
                                    <x-form.error for="school_name" />
                                </div>
                                <div class="sm:col-span-full">
                                    <x-form.label for="school_address" value="School Address" />
                                    <x-form.input type='text' id="school_address" name="school_address"
                                        value="{{ old('school_address') }}" placeholder="Enter school address" />
                                    <x-form.error for="school_address" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="honors_received" value="Honor Received" />
                                    <x-form.input type='text' id="honors_received" name="honors_received"
                                        value="{{ old('honors_received') }}" placeholder="Enter honor received" />
                                    <x-form.error for="honors_received" />
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="year_graduated" value="Year Graduated" />
                                    <x-form.input type='number' id="year_graduated" name="year_graduated"
                                        min="1900" max="{{ date('Y') }}"
                                        value="{{ old('year_graduated') }}" placeholder="Enter year graduated" />
                                    <x-form.error for="year_graduated" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-4" aria-expanded="true"
                            aria-controls="accordion-collapse-body-4">
                            <span>Chosen Academic Program</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-4" class="hidden"
                        aria-labelledby="accordion-collapse-heading-4">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <x-form.label for="program_id" value="Program" />
                                    <select name="program_id" id="program_id"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        @foreach ($programs as $program)
                                            <option @selected(old('program_id') == $program->id) value="{{ $program->id }}">
                                                {{ $program->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="year_level_id" value="Year Level" />
                                    <select name="year_level_id" id="year_level_id"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        @foreach ($levels as $level)
                                            <option @selected(old('year_level_id') == $level->id) value="{{ $level->id }}">
                                                {{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:col-span-1">
                                    <x-form.label for="academic_year_id" value="Academic Year" />
                                    <select name="academic_year_id" id="academic_year_id"
                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                                        @foreach ($academic_year as $year)
                                            <option @selected(old('academic_year_id') == $year->id) value="{{ $year->id }}">
                                                AY: {{ $year->getYear() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-button.submit value="Add student" />
            </form>
        </div>
    </section>
</x-layout.app>
