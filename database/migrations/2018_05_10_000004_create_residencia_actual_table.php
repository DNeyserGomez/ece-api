<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenciaActualTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'residencia_actual';

    /**
     * Run the migrations.
     * @table residencia_actual
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idresidenciaCurpPaciente');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->string('direccion', 70);
            $table->string('seccion', 20)->nullable()->default(null);
            $table->string('manzana', 20)->nullable()->default(null);
            $table->string('casa', 10);
            $table->string('colonia', 40);
            $table->string('areaGeoestadistica', 30)->nullable()->default(null);
            $table->string('telCasa', 10)->nullable()->default(null);
            $table->string('telCelular', 10);
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
