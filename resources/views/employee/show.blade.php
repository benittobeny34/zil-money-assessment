<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2">
                <div class="">
                    <div
                        class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                        style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
                    </div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                                </svg>
                                {{ $employee->willing_to_work ? 'yes' : 'no'}}
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Full Name: {{ $employee->name }}</div>
                            <div class="text-gray-900 font-bold text-xl mb-2">First Name: {{ $employee->first_name }}</div>
                            <div class="text-gray-900 font-bold text-xl mb-2">Last Name: {{ $employee->last_name }}</div>
                            <div
                                class="text-gray-900 font-bold text-xl mb-2">Languages Known: {{ $employee->getLanguagesKnownList() }}</div>
                        </div>
                    </div>
                </div>

                <p class="text-center text-gray-500 text-xs">
                    &copy;2020 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
