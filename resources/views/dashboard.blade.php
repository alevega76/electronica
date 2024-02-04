@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <h1>Dashboardxx</h1>
@stop

@section('content')

<div x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
<x-theme-toggle/>

    <p class="caja">Welcome to this beautiful admin panel.</p>


    <label for="toggle" class="flex items-center cursor-pointer">
      <div class="relative">
        <!-- Input checkbox -->
        <input type="checkbox" id="toggle" class="sr-only">
        <!-- Switch background -->
        <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
        <!-- Switch button -->
        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow left-0 transition"></div>
      </div>
      <!-- Text label -->
      <div class="ml-3 text-gray-700 font-medium">Toggle Switch</div>
    </label>
    
    <a href="">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-disabled"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          stroke-width="1.25"
          stroke="currentColor"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          ...
        </svg>
        Click me
      </a>
      
  <button 
      class="w-20 h-10 rounded-full bg-white flex items-center transition duration-300 focus:outline-none shadow"
      onclick="toggleTheme()">
      <div
          id="switch-toggle"
          class="w-12 h-12 relative rounded-full transition duration-500 transform bg-yellow-500 -translate-x-2 p-1 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
      </div>
  </button>


  <x-theme-toggle/>
</div>
</div>
@stop



@section('css')
    
@stop

@section('js')
    <script> 
    
    console.log('Hi!'); 
   

  
    // Script para manejar el cambio de estado del interruptor
    document.getElementById('toggle').addEventListener('change', function() {
      const dot = document.querySelector('.dot');
      dot.style.transform = this.checked ? 'translateX(100%)' : 'translateX(0)';
    });
  


const switchToggle = document.querySelector('#switch-toggle');
let isDarkmode = false;

const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`;

const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`;

function toggleTheme (){
  isDarkmode = !isDarkmode
  localStorage.setItem('isDarkmode', isDarkmode)
  switchTheme()
}

function switchTheme (){
  if (isDarkmode) {
    switchToggle.classList.remove('bg-yellow-500','-translate-x-2')
    switchToggle.classList.add('bg-gray-700','translate-x-full')
    setTimeout(() => {
      switchToggle.innerHTML = darkIcon
    }, 250);
  } else {
    switchToggle.classList.add('bg-yellow-500','-translate-x-2')
    switchToggle.classList.remove('bg-gray-700','translate-x-full')
    setTimeout(() => {
      switchToggle.innerHTML = lightIcon
    }, 250);
  }
}

switchTheme()
   
 
    </script>


@stop
