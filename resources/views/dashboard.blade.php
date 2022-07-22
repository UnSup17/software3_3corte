<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mb-0 text-xl text-gray-800 leading-tight">
            {{ __('Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Gestion Docentes
                    <ul>
                        <li><button class="border border-dark"><a href="{{ route('admin_docentes') }}">Gestionar docentes</a></button></li>
                    </ul>
                    <hr class="dropdown-divider">
                    Gestion Horarios
                    <ul>
                        <li><button class="border border-dark"><a href="{{ route('form_crear_horario') }}">Asignar horarios</a></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
