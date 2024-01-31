@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-white dark:bg-gray-800 shadow">
                  
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
   
@stop
