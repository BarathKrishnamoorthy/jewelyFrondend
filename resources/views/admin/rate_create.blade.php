@extends('layouts.app')

@section('content')
    @include('admin.narbar')
    <div class="container mx-auto px-4 py-10">
        <b><a href="/home">Dashboard</a> > <a href="/rate-list">Rate List</a> > <a class="add">Add</a></b>

        <h1 class="text-4xl font-extrabold mb-6 text-gray-800 border-b pb-3">{{ $title }}</h1>
    </div>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rate.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
         <div class="mb-6">
            <label for="subtitle" class="block text-gray-700 font-bold mb-2">SubTitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div class="mb-6">
            <label for="rate" class="block text-gray-700 font-bold mb-2">Rate</label>
            <input type="text" name="rate" id="rate" value="{{ old('rate') }}"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Create
                Rate</button>
        </div>
    </form>
