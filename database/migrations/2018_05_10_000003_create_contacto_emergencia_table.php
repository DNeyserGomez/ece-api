<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoEmergenciaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'contacto_emergencia';

    /**
     * Run the migrations.
     * @table contacto_emergencia
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('curpPacienteContactoE');
            $table->string('nombreCompleto', 60);
            $table->integer('parentesco');
            $table->string('telCasa', 20)->nullable()->default(null);
            $table->string('telCelular', 20);
            $table->string('email', 50)->nullable()->default(null);
            $table->string('direccion', 80);
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
