<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Update Employee</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-1" method="POST"
                      action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                            First Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="first_name" value="{{ $employee->first_name }}" name="first_name" type="text"
                            placeholder="First Name">
                        @error('first_name')
                        <span class="is-invalid text-red-600">first name required*</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                            Last Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="last_name" name="last_name"
                            value="{{ $employee->last_name }}"
                            type="text" placeholder="Last Name">
                        @error('last_name')
                        <span class="is-invalid text-red-600">Last name required*</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="md:w-1/3"></div>
                        <label class="md:w-2/3 block text-gray-500 font-bold">
                            <input class="mr-2 leading-tight" type="radio"
                                   name="willing_to_work" @checked($employee->willing_to_work)>
                            <span class="text-sm">Willing To Work</span>
                        </label>
                        @error('willing_to_work')
                        <span class="is-invalid text-red-600">willing To Work filed required*</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="md:w-1/3"></div>
                        <span>Languages Known(multiple)</span>
                        <label class="md:w-2/3 block text-gray-500 font-bold">
                            <input class="mr-2 leading-tight"
                                   type="checkbox" name="languages_known[]"
                                   value="tamil"
                                @checked(in_array('tamil', $languageList))
                            >
                            <span class="text-sm">Tamil</span>
                        </label>
                        <label class="md:w-2/3 block text-gray-500 font-bold">
                            <input class="mr-2 leading-tight" type="checkbox" name="languages_known[]"
                                   value="english"
                                @checked(in_array('english', $languageList))
                            >
                            <span class="text-sm">English</span>
                        </label>
                        <label class="md:w-2/3 block text-gray-500 font-bold">
                            <input class="mr-2 leading-tight" type="checkbox"
                                   name="languages_known[]"
                                   value="hinidi"
                                @checked(in_array('hinidi', $languageList))
                            >
                            <span class="text-sm">Hindi</span>
                        </label>
                        <label class="md:w-2/3 block text-gray-500 font-bold">
                            <input class="mr-2 leading-tight"
                                   type="checkbox"
                                   name="languages_known[]"
                                   value="malayalam"
                                @checked(in_array('malayalam', $languageList))
                            >
                            <span class="text-sm">Malalayalam</span>
                        </label>

                        @error('langugaes_know')
                        <span class="is-invalid text-red-600">Input is invalid*</span>
                        @enderror
                    </div>
                    <button class="btn btn-sm bg-gray-900 text-white rounded p-2" type="submit">Update</button>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2020 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
