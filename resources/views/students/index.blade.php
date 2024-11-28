<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Student Management</title>
</head>

<body>
    {{-- Tailwind CSS inside container --}}
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">List of Students</h1>
        <div class="relative overflow-x-auto sm:rounded-lg">
            <a href="{{ route('students.index') }}"
            class="inline-block px-4 py-2 mb-4 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
             Add a new Student
         </a>
            <div class="min-w-full">
                <table class="w-full min-w-[800px] text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                    <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->phone }}</td>
                            <td class="px-6 py-4">{{ $student->email }}</td>
                            <td class="px-6 py-4">
                                <button class="px-4 py-2 mr-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Edit</button>
                                <button class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
