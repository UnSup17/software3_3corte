<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ __('Crear Docente') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--  --}}
                    <section class="modal-body">
                        <form method="POST" action="{{ route('crear_docente') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoID">
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="pp">PP</option>
                                </select>
                                <label>Tipo de Identificación</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="id" class="form-control" placeholder=".">
                                <label>Número de identificación</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" placeholder=".">
                                <label>Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="apellido" class="form-control" placeholder=".">
                                <label>Apellido</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoDocente">
                                    <option value="tecnico">Tecnico</option>
                                    <option value="profesional">Profesional</option>
                                </select>
                                <label>Tipo de docente</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoContrato">
                                    <option value="pt">Planta</option>
                                    <option value="cnt">Contratista</option>
                                </select>
                                <label>Tipo de contrato</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="area" class="form-control" placeholder=".">
                                <label>Area</label>
                            </div>
                            <div class="input-group">
                                <input class="form-control border border-success" type="submit" value="Crear docente">
                            </div>
                        </form>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
