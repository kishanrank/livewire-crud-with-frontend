<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
            role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <x-form.input.button type="button" label="Create New Book" event-action="create()" event-name="click"
        class="btn btn-sm hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="create-book" />
    @if ($isOpen)
        @include('admin.books.create')
    @endif
    <div class="overflow-x-auto">
        <table class="table table-compact w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($books && count($books))
                    @foreach ($books as $book)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $book->name }}</td>
                            <td class="border px-4 py-2"><img src="{{ $book->image }}" height="75px" width="75px" />
                            </td>
                            <td class="border px-4 py-2">${{ $book->price }}</td>
                            <td class="border px-4 py-2">{{ $book->created_at }}</td>
                            <td class="border px-4 py-2">
                                <x-form.input.button type="button" label="Edit" event-action="edit({{ $book->id }})"
                                    event-name="click"
                                    class="btn btn-sm hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    id="edit-book" />
                                <x-form.input.button type="button" label="Delete"
                                    event-action="delete({{ $book->id }})" event-name="click"
                                    class="btn btn-sm bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    id="delete-book" />
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Books data not available!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {!! $books->links('vendor.livewire.tailwind') !!}
    </div>
</div>
