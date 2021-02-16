<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="panel-body">
                                <table class="table table-striped book-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>Book</th>
                                        <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <!-- Book Name -->
                                                <td class="table-text">
                                                    <div>{{ $book->title }}</div>
                                                </td>

                                                <td>
                                                    <!-- TODO: Delete Button -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
