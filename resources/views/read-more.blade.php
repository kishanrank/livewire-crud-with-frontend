@extends('layouts.frontend.default')

@section('title')
    Read Book | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="justify-center col-start-1 col-end-7">
        @livewire('frontend.readbook', ['book' => $book])
    </div>
@endsection
