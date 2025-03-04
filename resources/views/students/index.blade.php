<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Student Management</title>
    <script>
        // JavaScript to hide success message after 5 seconds
        window.onload = function() {
            const successMessage = document.getElementById("success-message");
            if (successMessage) {
                setTimeout(function() {
                    successMessage.classList.add('opacity-0');
                    successMessage.classList.add('pointer-events-none');
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        };
    </script>
</head>

<body>
    {{-- Tailwind CSS inside container inside store function in controller --}}
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">List of Students</h1>

         {{-- Display success message if available --}}
         @if(session('msg'))
            <div id="success-message" class="p-4 mb-4 text-white transition-opacity duration-300 bg-green-500 rounded-md">
                {{ session('msg') }}
            </div>
        @endif

        <div class="relative overflow-x-auto sm:rounded-lg">
            <a href="{{ route('students.create') }}"
            class="inline-block px-4 py-2 mb-4 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
             Add a new Student
            </a>

            <form action="{{ url('students') }}" method="GET">
                <div class="flex items-center gap-3 pb-4">
                    <div class="relative inline-block text-left">
                        <!-- Filter Button -->
                        <button id="filterButton" class="flex items-center gap-2 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Filter <span class="material-icons">▼</span>
                        </button>

                        <!-- Dropdown Menu -->
                        <ul id="dropdownMenu" class="absolute hidden w-32 mt-2 bg-white rounded-md shadow-md">
                            <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ request()->fullUrlWithQuery(['status' => null, 'page' => 1]) }}">All</a></li>
                            <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ request()->fullUrlWithQuery(['status' => 'active', 'page' => 1]) }}">Active</a></li>
                            <li><a class="block px-4 py-2 hover:bg-gray-100" href="{{ request()->fullUrlWithQuery(['status' => 'inactive', 'page' => 1]) }}">Inactive</a></li>
                        </ul>
                    </div>

                    <script>
                        const filterButton = document.getElementById("filterButton");
                        const dropdownMenu = document.getElementById("dropdownMenu");
                        const dropdownLinks = document.querySelectorAll("#dropdownMenu a");

                        // Toggle dropdown visibility
                        filterButton.onclick = () => dropdownMenu.classList.toggle("hidden");

                        // Handle dropdown option click
                        dropdownLinks.forEach(link => {
                            link.onclick = (e) => {
                                e.preventDefault();
                                window.location.href = link.href;
                            };
                        });

                        // Close dropdown if clicked outside
                        window.onclick = (e) => {
                            if (!e.target.closest(".relative")) {
                                dropdownMenu.classList.add("hidden");
                            }
                        };
                    </script>
                    <!-- Search Input -->
                    <input value="{{ request()->search }}" type="text" name="search" class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Search students...">

                    <!-- Search Button -->
                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Search
                    </button>
                    <!-- Clear Search Button -->
                    <a href="{{ url('students') }}" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">
                      Clear
                    </a>
                </div>
            </form>


            <div class="min-w-full">
                <table class="w-full min-w-[800px] text-sm text-left rtl:text-right text-gray-700 dark:text-gray-300">
                    <thead class="text-xs text-gray-800 uppercase bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Phone</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->phone }}</td>
                            {{-- Show Active if status is 1, Inactive if 0 --}}
                            <td class="px-6 py-4">
                                <span class="{{ $student->status == 1 ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                    {{ $student->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-6 py-4">{{ $student->email }}</td>
                            {{--u can give the date  format --}}
                            <td class="px-6 py-4">{{ $student->created_at->format('Y-M-d') }}</td>
                            <td class="px-6 py-4">
                                {{-- view button --}}
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('students.show', $student->id) }}">
                                        <button class="flex items-center gap-2 px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                                            <i class="fa-solid fa-eye"></i> View
                                        </button>
                                    </a>

                                    {{-- edit button --}}
                                    <a href="{{ route('students.edit', $student->id) }}">
                                        <button class="flex items-center gap-2 px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </button>
                                    </a>
                                    {{-- delete button --}}
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $students->appends(['search' => request()->search])->links() }}
        </div>
    </div>
</body>


</html>
