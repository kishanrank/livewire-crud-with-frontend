@extends('layouts.frontend.default')

@section('title')
    Profile | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="w-full lg:flex-row">
        @livewire('frontend.profile')
    </div>
@endsection
