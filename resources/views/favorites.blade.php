@extends('layouts.frontend.default')

@section('title')
    Favorite Books | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="grid card bg-base-300 rounded-box place-items-center">
        @livewire('frontend.favorites')
    </div>
@endsection
