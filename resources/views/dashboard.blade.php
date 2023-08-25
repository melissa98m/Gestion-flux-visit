<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Vous êtez connecté!") }}
                </div>
                <a class="btn btn-info" href="{{ url('/visits')}}">Gerer les visites</a> <br/>
                <a href="{{ url('/visitors')}}">Gerer les visteurs</a><br/>
                <a href="{{ url('/status')}}">Gerer les statuts</a><br/>
                <a href="{{ url('/companies')}}">Gerer les entreprise</a><br/>
            </div>
        </div>
    </div>
</x-app-layout>
