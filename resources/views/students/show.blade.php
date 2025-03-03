@extends('layouts.app')

{{-- @section('title')
student management
@endsection --}}


@section('title','student management')



@section('content')

<body class="bg-gray-100">

    <div class="container p-6 mx-auto my-10">
        <!-- Page Title -->
        <h1 class="mb-6 text-3xl font-bold text-center text-gray-800">Student Details</h1>

        <!-- Back Button -->
        <div class="mb-6 text-center">
            <a href="{{ route('students.index') }}"
                class="inline-flex items-center px-6 py-2 text-white transition duration-300 bg-green-600 rounded-lg hover:bg-green-700">
                <i class="mr-2 fa-solid fa-arrow-left"></i> Back to Student List
            </a>
        </div>

        <!-- Card -->
        <div class="max-w-2xl p-8 mx-auto bg-white shadow-lg rounded-2xl">
            <!-- Profile Icon -->
            <div class="flex items-center justify-center mb-6">
                <div class="flex items-center justify-center w-24 h-24 text-blue-600 bg-blue-100 rounded-full">
                    <i class="text-4xl fa-solid fa-user"></i>
                </div>
            </div>

            <!-- Student Info -->
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Name:</span>
                    <span class="font-semibold text-gray-800">{{ $student->name }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">{{ $student->phone }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Email:</span>
                    <span class="font-semibold text-gray-800">{{ $student->email }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Status:</span>
                    <span class="font-semibold
                        {{ $student->status == 1 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $student->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </div>


                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Created At:</span>
                    <span class="font-semibold text-gray-800">{{ $student->created_at->format('d-m-Y') }}</span>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection
