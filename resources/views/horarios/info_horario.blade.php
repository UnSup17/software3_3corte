<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ $horario_docente->docente->nombre . ' ' . $horario_docente->docente->apellido }}
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
                                <div><b>Periodo</b></div>
                                <div>{{ $horario_docente->periodo->nombre }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Docente</b></div>
                                <div>{{ ucfirst($horario_docente->docente->nombre).' '.ucfirst($horario_docente->docente->apellido) }}</div>
                            </div>
                            <hr class="dropdown-divider">
                            <div>
                                <div><b>Horas semana</b></div>
                                <div>{{ $horas_semana }}</div>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="box-horario w-75 ml-4">
                            <table class="table table-bordered text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"></th>
                                        @foreach ($dias as $dia)
                                            <th class="table-active" scope="col">{{ $dia }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horas as $hora)
                                        <tr>
                                            <th class="table-active" scope="row">{{ $hora }}</th>
                                            @foreach ($dias as $dia)
                                                @if(!array_key_exists($dia.$hora, $horario))
                                                    @if(!array_key_exists($dia.$hora, $ignorar_td))
                                                        <td></td>
                                                    @endif
                                                @else
                                                    <td rowspan="{{ $horario[$dia.$hora]->duracion }}" style="vertical-align: middle; word-wrap: break-word;
                                                        background: {{ $horario[$dia.$hora]->competencia->color }}">
                                                        {{ $horario[$dia.$hora]->competencia->nombre }}
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
