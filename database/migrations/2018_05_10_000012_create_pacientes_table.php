<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pacientes';

    /**
     * Run the migrations.
     * @table pacientes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPacientes');
            $table->string('curp', 18);
            $table->string('nombre', 40)->nullable();
            $table->string('apellidoPaterno', 30);
            $table->string('apellidoMaterno', 30)->nullable();
            $table->date('fechaNacimiento');
            $table->string('sexo', 2);
            $table->string('estadoCivil', 20);
            $table->integer('esIndigena')->nullable();
            $table->integer('escolaridad');
            $table->integer('ocupacion')->nullable();
            $table->integer('religion')->nullable();
            $table->string('email', 45)->nullable();
            $table->integer('nacionalidad');
            $table->tinyInteger('migrante');
            $table->string('numeroExpedienteFisico', 50);
            $table->string('credencialElector', 18);
            $table->integer('grupoSanguineo');
            $table->integer('factorRH');
            $table->integer('discapacidadPaciente');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->integer('estado_idestado');
            $table->integer('pais_nacimiento_idpais_nacimiento');
            $table->integer('municipio_idmunicipio');
            $table->integer('localidad_idlocalidad');

            $table->index(["municipio_idmunicipio"], 'fk_pacientes_municipio1_idx');

            $table->index(["estado_idestado"], 'fk_pacientes_estado1_idx');

            $table->index(["localidad_idlocalidad"], 'fk_pacientes_localidad1_idx');

            $table->index(["pais_nacimiento_idpais_nacimiento"], 'fk_pacientes_pais_nacimiento1_idx');


            $table->foreign('estado_idestado', 'fk_pacientes_estado1_idx')
                ->references('idestado')->on('estado')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pais_nacimiento_idpais_nacimiento', 'fk_pacientes_pais_nacimiento1_idx')
                ->references('idpais_nacimiento')->on('pais_nacimiento')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('municipio_idmunicipio', 'fk_pacientes_municipio1_idx')
                ->references('idmunicipio')->on('municipio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localidad_idlocalidad', 'fk_pacientes_localidad1_idx')
                ->references('idlocalidad')->on('localidad')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
