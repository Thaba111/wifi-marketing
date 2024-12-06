@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-lg shadow-lg">
            <!-- Header with Icon -->
            <div class="text-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                </svg>
                <h2 class="text-4xl font-bold text-gray-900 mt-4">Email Verification</h2>
                <p class="mt-2 text-lg text-gray-600">Please check your email for a verification link.</p>
            </div>

            <!-- Resend Verification Form -->
            <div class="space-y-6">
                <div class="text-center">
                    <p class="text-gray-500">Didn't receive the verification link? Click below to resend.</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button
                        type="submit"
                        class="w-full py-3 px-4 mt-4 bg-indigo-600 text-black font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200"
                    >
                        Resend Verification Email
                    </button>

                    </form>
                </div>
            </div>

            
        </div>
    </div>
@endsection
