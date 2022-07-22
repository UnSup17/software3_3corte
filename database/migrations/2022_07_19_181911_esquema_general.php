<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('tipoID', ['cc', 'ti', 'pp']);
            $table->enum('tipoDocente', ['tecnico', 'profesional']);
            $table->enum('tipoContrato', ['pt', 'cnt']);
            $table->string('area');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoCompetencia', ['generica', 'especifica']);
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->timestamps();
        });
        Schema::create('ambientes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->enum('tipoAmbiente', ['virtual', 'presencial']);
            $table->integer('capacidad');
            $table->text('ubicacion');
            $table->timestamps();
        });
        Schema::create('bloques', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
            $table->integer('hora_inicio');
            $table->integer('hora_fin');
            $table->foreignId('competencia_id')->constrained('competencias');
            $table->timestamps();
        });
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docente_id')->constrained('docentes');
            $table->foreignId('bloque_id')->constrained('bloques');
            $table->foreignId('ambiente_id')->constrained('ambientes');
            $table->foreignId('periodo_id')->constrained('periodos');
            $table->timestamps();
        });
        Schema::create('competencia_programa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competencia_id')->constrained('competencias');
            $table->foreignId('programa_id')->constrained('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
