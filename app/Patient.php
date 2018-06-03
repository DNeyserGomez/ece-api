<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //public timestamps = false;
    protected $table = 'pacientes';
    protected $fillable = [
        'curp', 'nombre', 'apellidoPaterno', 'apellidoMaterno',
        'fechaNacimiento', 'sexo', 'estadoCivil', 'edad', 'esIndigena',
        'escolaridad', 'ocupacion', 'religion', 'email', 'nacionalidad',
        'migrante', 'numeroExpedienteFisico', 'credencialElector',
        'grupoSanguineo', 'factorRH', 'discapacidadPaciente'
    ];
}
