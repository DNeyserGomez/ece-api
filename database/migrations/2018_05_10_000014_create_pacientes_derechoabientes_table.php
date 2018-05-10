<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesDerechoabientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pacientes_derechoabientes';

    /**
     * Run the migrations.
     * @table pacientes_derechoabientes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pacientes_curp');
            $table->integer('derechoabientes_idderechoabientes');
            $table->tinyInteger('esTitular')->nullable();
            $table->string('numAfiliacion', 45)->nullable();
            $table->date('fecha')->nullable();

            $table->index(["derechoabientes_idderechoabientes"], 'fk_pacientes_has_derechoabientes_derechoabientes1_idx');

            $table->index(["pacientes_curp"], 'fk_pacientes_has_derechoabientes_pacientes_idx');


            $table->foreign('pacientes_curp', 'fk_pacientes_has_derechoabientes_pacientes_idx')
                ->references('curp')->on('pacientes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('derechoabientes_idderechoabientes', 'fk_pacientes_has_derechoabientes_derechoabientes1_idx')
                ->references('idderechohabiencia')->on('derechohabiencia')
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
