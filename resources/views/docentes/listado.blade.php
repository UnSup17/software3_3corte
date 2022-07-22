<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ __('Lista Docentes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--  --}}
                    @if($lista_docentes->isEmpty() )
                        <p class="text-danger">No hay profesores que mostrar</p><br>
                    @else
                        <section class="modal-body">
                            <table class="tabla-info mx-auto">
                                <thead>
                                    <tr>
                                        <th class="px-2">ID</th>
                                        <th class="px-2">Tipo ID</th>
                                        <th class="px-2">Nombre</th>
                                        <th class="px-2">Apellido</th>
                                        <th class="px-2">Tipo contrato</th>
                                        <th class="px-2">Formacion</th>
                                        <th class="px-2">Area</th>
                                        <th class="px-2">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lista_docentes as $docente)
                                        <section>
                                            <tr>
                                                <td class="text-center">{{ $docente->id }}</td>
                                                <td class="text-center">{{ strtoupper($docente->tipoID) }}</td>
                                                <td class="text-center">{{ $docente->nombre }}</td>
                                                <td class="text-center">{{ $docente->apellido }}</td>
                                                <td class="text-center">
                                                    @if($docente->tipoContrato == 'pt')
                                                        {{ 'Planta' }}
                                                    @else
                                                        {{ 'Contratista' }}
                                                    @endif
                                                </td>
                                                <td class="text-center"> {{ ucfirst($docente->tipoDocente) }}</td>
                                                <td class="text-center">{{ $docente->area }}</td>
                                                <td class="text-center">
                                                    <span class="position-relative
                                                        @if($docente->estado == 'activo')
                                                            {{ 'estado-activo' }}
                                                        @else
                                                            {{ 'estado-inactivo' }}
                                                        @endif
                                                    ">{{ ucfirst($docente->estado) }}</span>
                                                </td>
                                                <td class="text-center">
                                                        <button class="border border-info"><a href="{{ route('read_docente', ['docente' => $docente->id])}}">Administrar horarios</a></button>
                                                    <button class="border border-success"><a href="{{ route('form_actualizar_docente', ['docente' => $docente->id])}}">Actualizar</a></button>
                                                    @if($docente->estado == 'activo')
                                                        <button class="border border-warning"><a class="delete" href="{{ route('inactivar_docente', ['docente' => $docente->id])}}">Inactivar</a></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </section>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    @endif
                    <section class="text-center">
                        <button><a href="{{ route('form_crear_docente') }}">Añadir docente</a></button>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
