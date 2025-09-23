<link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <h1 style="color: white; font-size: 3em; text-align: center; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Welcome to league Simulator {{ Auth::user()->name}}</h1>
    <div class="links">
        <form action="{{ route('teams.index') }}" method="GET">
            <button type="submit" class="btn">View Teams</button>
        </form>

        <form action="{{ route('match.index') }}" method="GET">
            <button type="submit" class="btn">Matches</button>
        </form>

        <form action="{{ route('ranking.index') }}" method="GET">
            <button type="submit" class="btn">Rankings</button>
        </form>
    </div>
</x-app-layout>
