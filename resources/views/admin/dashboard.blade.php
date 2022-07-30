@extends('layouts.admin.default')

@section('title')
Book Webapp Dashboard
@endsection

@section('content')
    <div class="flex flex-col w-full md:flex-row">
        <div class="grid flex-grow card">
            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Hello there, <b>{{Auth::user()->name}}</b></h1>
                        <p class="py-6">Welcome to admin portal of Book Web App</p>
                        {{-- <button class="btn btn-primary">Get Started</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
