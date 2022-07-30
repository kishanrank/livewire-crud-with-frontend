<div class="grid gap-x-8 gap-y-4 grid-cols-15">
    <div class="flex justify-center h-20">
        <h1><b>Read Book</b></h1>
    </div>
    @if ($book && isset($book->id))
        <div>
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure>
                    <img class="p-6 rounded-xl" src="{{ $book->image }}" alt="{{ $book->name }}" width="600px"
                        height="400px" >
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $book->name }}</h2>
                    <span>Description:</span>
                    <span>{{ $book->description }} </span>
                    <span><b>Price: &dollar;{{ $book->price }}</b></span>
                    <div class="card-actions justify-left">

                        @if ($isFavorite)
                            <div wire:click="removeFromFavorite()" title="Remove from favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @else
                            <div wire:click="addToFavorite()" title="Add to favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1>Book data Not Available!</h1>
    @endif
</div>
