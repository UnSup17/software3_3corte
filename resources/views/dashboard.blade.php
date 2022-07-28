<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold mb-0 text-xl text-gray-800 leading-tight">
            {{ __('Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="text-align: -webkit-center;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-75">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container d-flex justify-content-center">
                        <div class="card m-2">
                            <h4 class="pl-3 pt-3">Docentes</h4>
                            <div class="p-2">
                                <button class="border border-dark pr-3"><a href="{{ route('admin_docentes') }}">
                                    <i class="fa-solid fa-user-gear m-2"></i>Gestionar docentes</a>
                                </button>
                            </div>
                        </div>
                        <div class="card m-2">
                            <h4 class="pl-3 pt-3">Horarios</h4>
                            <div class="p-2">
                                <button class="border border-dark pr-3"><a href="{{ route('form_crear_horario') }}">
                                    <i class="fa-solid fa-calendar-days m-2"></i>Asignar horarios</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
