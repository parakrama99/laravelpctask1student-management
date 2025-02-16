
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Student</title>
    {{-- arrow icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    {{-- Tailwind CSS inside container --}}
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Edit Student Details</h1>
        <a href="{{ route('students.index') }}"
        class="inline-block px-4 py-2 mb-4 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
        <i class="mr-2 fa-solid fa-arrow-left"></i> Back to Student List
    </a>

        {{-- Store Data After Clicking Submit --}}
        <form action="{{ route('students.update', $student) }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
            @csrf {{-- CSRF Token for Security --}}
            @method('PUT')

            {{-- Name Field --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                {{-- Name Validation Error --}}
                @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- Phone Field --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{  old('phone', $student->phone) }}" required
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
                <input type="email" id="email" name="email" value="{{ old('email', $student->email)  }}" required
                    class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                {{-- Email Validation Error --}}
                {{-- @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror --}}
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="px-4 py-2 font-semibold text-white transition duration-200 bg-blue-500 rounded-md hover:bg-blue-600">
                Save
            </button>
        </form>
    </div>

</body>

</html>
