<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
    <h1>{{Session::get('success')}}</h1>
    <button>telecharger votre recu ici</button>
    @endif
   
</x-app-layout>