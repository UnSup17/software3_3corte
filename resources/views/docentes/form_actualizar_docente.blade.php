<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ __('Actualizar Docente') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--  --}}
                    <section class="modal-body">
                        <form method="POST" action="{{ route('actualizar_docente', ["docente" => $docente->id]) }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" value="{{ $docente->nombre }}">
                                <label>Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="apellido" class="form-control" value="{{ $docente->apellido }}">
                                <label>Apellido</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoDocente">
                                    <option value="tecnico" <?php if ($docente->tipoDocente == "tecnico") echo("selected")?>>Tecnico</option>
                                    <option value="profesional" <?php if ($docente->tipoDocente == "profesional") echo("selected")?>>Profesional</option>
                                </select>
                                <label>Tipo de docente</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoContrato">
                                    <option value="pt" <?php if ($docente->tipoContrato == "pt") echo("selected")?>>Planta</option>
                                    <option value="cnt" <?php if ($docente->tipoContrato == "cnt") echo("selected")?>>Contratista</option>
                                </select>
                                <label>Tipo de contrato</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="area" class="form-control" value="{{ $docente->area }}">
                                <label>Area</label>
                            </div>
                            <div class="input-group">
                                <input class="form-control border border-success" type="submit" value="Actualizar docente">
                            </div>
                        </form>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
