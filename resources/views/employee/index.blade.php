<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Employee</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2 text-white bg-gray-900">
                <table class="table-auto border-solid border-2 border-sky-800">
                    <thead class="table-auto border-solid border-2 border-sky-800">
                    <tr class="table-auto border-solid border-2 border-sky-800 p-2">
                        <th class="px-2 mx-2" >First Name</th>
                        <th class="px-2 mx-2">Last Name</th>
                        <th class="px-2 mx-2">Full Name</th>
                        <th class="px-2 mx-2">Languages Know list</th>
                        <th class="px-2 mx-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr class="table-auto border-solid border-2 border-sky-800 p-2">
                            <td class="px-2 mx-2">{{ $employee->first_name }}</td>
                            <td class="px-2 mx-2">{{ $employee->last_name }}</td>
                            <td class="px-2 mx-2">{{ $employee->name }}</td>
                            <td class="px-2 mx-2">{{ $employee->getLanguagesKnownList() }}</td>
                            <td class="px-2 mx-2">
                                <div class="flex justify-between">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-500 px-2 mx-2
                                    ">View</a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-500 px-2 mx-2
                                    ">Update</a>
                                    <a href=" {{route('employees.destroy', $employee->id)}}" class="text-red-500 px-2 mx-2
                                    ">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="text-center text-gray-500 text-xs m-4">
                    &copy;2020 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>


