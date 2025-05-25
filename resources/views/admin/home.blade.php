@extends('layouts.app')
@section('content')
@include('admin.narbar')

      @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded shadow text-center">
          <strong>Success!</strong>
          {{ session('success') }}
        </div>
      @endif

<div class="max-w-2xl mx-auto mt-10 p-8 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome, Mr. RadhaKrishnan!</h1>
    <p class="text-lg text-gray-600 mb-2">We're glad to see you back.</p>
    <div class="flex items-center mt-4">
        <span class="inline-block bg-blue-100 text-blue-800 text-sm px-4 py-2 rounded-full font-semibold">
            {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
        </span>
    </div>
</div>