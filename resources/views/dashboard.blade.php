@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-blue-100 p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-800">Total Users</h2>
                <p class="text-3xl font-bold text-blue-900">120</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-green-100 p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-green-800">New Orders</h2>
                <p class="text-3xl font-bold text-green-900">45</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-yellow-100 p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-yellow-800">Revenue</h2>
                <p class="text-3xl font-bold text-yellow-900">$10,000</p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline">Go back to home</a>
        </div>
    </div>
</div>
@endsection
