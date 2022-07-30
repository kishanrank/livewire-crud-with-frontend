@extends('layouts.admin.default')

@section('title')
    Manage Books
@endsection

@section('css')
    <style>
        .table th:first-child {
            position: inherit !important
        }

    </style>
@endsection

@section('content')
    <div class="flex flex-col w-full md:flex-row">
        <div class="grid flex-grow card">
            @livewire('admin.books')
        </div>
    </div>
@endsection
