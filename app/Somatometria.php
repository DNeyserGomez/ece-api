<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Somatometria extends Model
{
    protected $table = 'somatometria';
    
    protected $fillable = [
        'idsomatometria', 'peso', 'longitud', 'perimetroCefalico', 'perimetroToracico',
        'perimetroAbdominal', 'pulso', 'temperatura', 'frecuenciaCardiaca',
        'frecuenciaRespiratoria', 'talla', 'pesoPorTalla', 'tallaPorEdad',
        'tensionArterial', 'glucemiaCapilar', 'hemoglobinaCapilar', 'cintura',
        'cadera', 'indiceCinturaCadera', 'indiceMasaCorporal', 'userCapture', 'userUpdate', 'pacientes_curp'
    ];
}
