<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ $docente->nombre.' '.$docente->apellido }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--  --}}
                    <section class="modal-body d-flex">
                        <div class="container card w-25">
                            <div class="pt-3">
                                <div><b>Id</b></div>
                                <div>{{ $docente->id }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Tipo Identificación</b></div>
                                <div>{{ strtoupper($docente->tipoID) }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Nombre Completo</b></div>
                                <div>{{ $docente->nombre.' '.$docente->apellido }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Formación</b></div>
                                <div>{{ $docente->tipoDocente }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Contrato</b></div>
                                <div>
                                @if ($docente->tipoContrato == 'pt')
                                    Planta
                                @else
                                    Contratista
                                @endif</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Area</b></div>
                                <div>{{ $docente->area }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="pb-3">
                                <div><b>Estado</b></div>
                                <div>{{ $docente->estado }}</div>
                            </div>
                        </div>
                        <div class="box-horario w-75 ml-4 card">
                            Inserte aqui un horario :3
                        </div>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
