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
        <h1 class="mb-4 text-2xl font-bold">Create New Student</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="relative p-4 mb-4 text-green-800 bg-green-100 border border-green-200 rounded alert" role="alert">
                <span>{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 close-alert">
                    <svg class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif

        {{-- Store Data After Clicking Submit --}}
        <form action="{{ route('students.store') }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
            @csrf {{-- CSRF Token for Security --}}

            {{-- Name Field --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                {{-- Name Validation Error --}}
                @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone Field --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    maxlength="10" placeholder="Enter 10-digit phone number" title="Please enter exactly 10 digits"
                    oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10)" />

                {{-- Phone Validation Error --}}
                @error('phone')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email Field --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                {{-- Email Validation Error --}}
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="px-4 py-2 font-semibold text-white transition duration-200 bg-blue-500 rounded-md hover:bg-blue-600">
                Save
            </button>
        </form>
    </div>

    {{-- Close Button Script --}}
    <script>
        document.querySelectorAll('.close-alert').forEach(function(button) {
            button.addEventListener('click', function() {
                this.closest('.alert').style.display = 'none';
            });
        });
    </script>
</body>

</html>
