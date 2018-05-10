<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSomatometriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'somatometria';

    /**
     * Run the migrations.
     * @table somatometria
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idsomatometria');
            $table->float('peso')->nullable();
            $table->float('longitud')->nullable();
            $table->float('perimetroCefalico')->nullable();
            $table->float('perimetroToracico')->nullable();
            $table->float('perimetroAbdominal')->nullable();
            $table->float('pulso')->nullable();
            $table->float('temperatura')->nullable();
            $table->float('frecuenciaCardiaca')->nullable();
            $table->float('frecuenciaRespiratoria')->nullable();
            $table->float('talla')->nullable();
            $table->float('pesoPorTalla')->nullable();
            $table->float('tallaPorEdad')->nullable();
            $table->float('tensionArterial')->nullable();
            $table->float('glucemiaCapilar')->nullable();
            $table->float('hemoglobinaCapitar')->nullable();
            $table->float('cintura')->nullable();
            $table->float('cadera')->nullable();
            $table->float('indiceCinturaCadera')->nullable();
            $table->float('indiceMasaCorporal')->nullable();
            $table->string('userCapture', 20)->nullable()->default(null);
            $table->string('userUpdate', 20)->nullable()->default(null);
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
