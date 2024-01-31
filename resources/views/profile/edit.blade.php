@extends('adminlte::page')

@section('content_header')

@vite(['resources/css/app.css', 'resources/js/app.js'])
@stop


@section('content')

@include('alerts.success')


@section('content')

    @section('header')
        <div class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Profiles
                  </h2>
            </div>
        </div>
    @endsection

    <div class="py-12" x-data="{darkMode: false}" :class="{'dark': darkMode === true }" class="antialiased">

       

        

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <x-theme-toggle/>
        
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

@endsection
