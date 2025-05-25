@extends('layouts.app')

@section('content')
@include('admin.narbar')

<div class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-extrabold mb-6 text-gray-800 border-b pb-3">{{ $title }}</h1>

    <div class="overflow-x-auto bg-white dark:bg-gray-900 shadow-lg rounded-2xl border border-gray-200 dark:border-gray-700 p-6">
        <table id="contactTable" class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">S.No</th>
                    <th class="px-6 py-4 text-left font-semibold">Name</th>
                    <th class="px-6 py-4 text-left font-semibold">Email</th>
                    <th class="px-6 py-4 text-left font-semibold">Message</th>
                    <th class="px-6 py-4 text-center font-semibold">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($contactUs as $index => $contact)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-150">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $contact->name }}</td>
                    <td class="px-6 py-4">{{ $contact->email }}</td>
                    <td class="px-6 py-4">{{ Str::limit($contact->message, 60) }}</td>
                    <td class="px-6 py-4 text-center">
                        <form method="POST" action="{{ route('contact.delete', ['id' => $contact->id]) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-xs font-bold rounded-lg shadow">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#contactTable').DataTable({
                responsive: true,
                pageLength: 5,
                dom: '<"flex justify-between items-center mb-4"f<"text-sm text-gray-600"l>>tip',
                language: {
                    search: "",
                    searchPlaceholder: "🔍 Search...",
                    lengthMenu: "Show _MENU_ entries",
                    paginate: {
                        previous: "←",
                        next: "→"
                    }
                }
            });

            $('div.dataTables_filter input')
                .addClass('rounded-md border border-gray-300 px-4 py-2 focus:ring-blue-500 focus:border-blue-500')
                .css({ 'width': '250px', 'margin-left': '10px' });

            $('div.dataTables_length select')
                .addClass('rounded-md border border-gray-300 px-2 py-1 focus:ring-blue-500 focus:border-blue-500');
        });
    </script>
@endsection
