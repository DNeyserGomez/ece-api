<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendarcitaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'agendarCita';

    /**
     * Run the migrations.
     * @table agendarCita
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idagenda');
            $table->string('pacientes_curp', 18);
            $table->date('fecha');
            $table->time('horaInicio');
            $table->time('horaFinal');
            $table->tinyInteger('tipoConsulta');
            $table->string('especialidadConsulta', 50);
            $table->string('medico', 50);
            $table->string('motivoConsulta', 20);
            $table->integer('statusConsulta')->nullable()->default('0');
            $table->timestamp('delete_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->string('userUpdate', 20)->nullable()->default(null);
            $table->string('userCapture', 20)->nullable()->default(null);
            $table->integer('somatometria_idsomatometria');

            $table->index(["somatometria_idsomatometria"], 'fk_agendarCita_somatometria1_idx');

            $table->index(["pacientes_curp"], 'fk_agenda_pacientes1_idx');


            $table->foreign('pacientes_curp', 'fk_agenda_pacientes1_idx')
                ->references('curp')->on('pacientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('somatometria_idsomatometria', 'fk_agendarCita_somatometria1_idx')
                ->references('idsomatometria')->on('somatometria')
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
