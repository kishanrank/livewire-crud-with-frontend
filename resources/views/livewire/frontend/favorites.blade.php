<div class="pt-6 w-11/12">
    <div class="form-control text-center pb-6 w-full">
        <input type="text" placeholder="Search" wire:model.debounce.400ms="search" class="input input-bordered">
    </div>
    @if ($books && count($books) > 0)
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div>
                    <div class="card card-compact bg-base-100 shadow-xl h-full">
                        <figure class="px-4 pt-6"><img src="{{ asset('storage/' . $book->image) }}" width="400px" height="225px"
                                max-height="225px" alt="{{ $book->name }}" class="rounded-xl max-h-72" />
                        </figure>
                        <div class="card-body px-4 pt-5">
                            <h2 class="card-title">{{ $book->name }}</h2>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($book->description) ?? '', 40, ' .....') }}
                            </p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary" wire:click="readMore({{ $book->id }})">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="w-full md:w-auto text-center">
            <h1>There are no books in the user's favourites.</h1>
        </div>
    @endif
    <div class="pt-6">
        {!! $books->links('vendor.livewire.tailwind') !!}
    </div>
</div>
