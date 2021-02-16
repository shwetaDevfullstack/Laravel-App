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
                    <form method="POST" action="{{ url('book-check') }}">
                        @csrf
                        <div>
                            <input type="hidden" name="book_id" id="book_id" value="{{ $book->id}}"/>
                            <label class="block font-medium text-sm text-gray-700" for="title">
                                Title
                            </label>
                            <input value="{{ $book->title}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="title" id="title" type="text" required="required" autofocus="autofocus">
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="isbn">
                            ISBN
                        </label>
                            <input value="{{ $book->isbn}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="isbn" type="text" name="isbn" required="required" autocomplete="autofocus">
                        </div>
                        <div class="block mt-4">
                            <lable for="action" class="inline-flex items-center">
                                <input value="CHECKIN" id="action" type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="action" required="required">
                                <span class="ml-2 text-sm text-gray-600">Checked In</span>
                            </label>
                            <label for="action" class="inline-flex items-center">
                                <input value="CHECKOUT" id="action" type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="action">
                                <span class="ml-2 text-sm text-gray-600">Checked Out</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>