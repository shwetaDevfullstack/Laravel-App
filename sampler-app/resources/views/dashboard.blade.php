<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!--div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                Test
            </div>
        </div-->
        <div class="md:px-32 py-8 w-full">
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ISBN</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Craeted At</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($books as $book)
                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5"><a class="hover:text-blue-500" href="{{ url('book-check/'.$book->id) }}">{{ $book->title }}</a></td>
                        <td class="p-3 px-5">{{ $book->isbn }}</td>
                        <td class="p-3 px-5">{{ $book->status }}</td>
                        <td class="p-3 px-5">{{ date('d-m-Y', strtotime($book->created_at)) }}</td>
                        <!--td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td-->
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
    </div>
</x-app-layout>
