<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
            {{ __('Asignar horario') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--  --}}
                    <section class="modal-body">
                        <form method="POST" action="{{ route('crear_horario') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <select class="form-select" name="periodo">
                                    @foreach ($periodos as $periodo)
                                        <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Periodos</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="docente">
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre.' '.$docente->apellido }}</option>
                                    @endforeach
                                </select>
                                <label>Docentes</label>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="w-100 mr-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="dia">
                                            @foreach ($dias as $dia)
                                                <option value="{{ $dia }}">{{ $dia }}</option>
                                            @endforeach
                                        </select>
                                        <label>Día</label>
                                    </div>
                                </div>
                                <div class="w-100 mx-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="hora_inicio">
                                            @for($i = 7; $i < 22; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label>Hora inicio</label>
                                    </div>
                                </div>
                                <div class="w-100 ml-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="duracion">
                                            @for($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label>Duracion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="competencia">
                                    @foreach ($competencias as $competencia)
                                        <option value="{{ $competencia->id }}">{{ $competencia->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Competencia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="ambiente">
                                    @foreach ($ambientes as $ambiente)
                                        <option value="{{ $ambiente->id }}">{{ $ambiente->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Ambiente</label>
                            </div>
                            <div class="input-group">
                                <input class="form-control border border-success" type="submit" value="Asignar bloque horario">
                            </div>
                        </form>
                    </section>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
