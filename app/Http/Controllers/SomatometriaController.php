<?php

namespace App\Http\Controllers;

use App\Somatometria;

use Illuminate\Http\Request;

class SomatometriaController extends Controller
{

    function index(Request $request ) {

        if ($request->isJson()) {
            
            $somatometria = Somatometria::all();

            return response()->json($somatometria, 200);      
        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }
    function createSomatometria(Request $request) {


        $objSomatometria = new Somatometria;
        	
        $objSomatometria->engine = 'InnoDB';
        $objSomatometria->idsomatometria = $request->idsomatometria;
        $objSomatometria->peso = $request->peso;
        $objSomatometria->longitud = $request->longitud;
        $objSomatometria->perimetroCefalico = $request->perimetroCefalico;
        $objSomatometria->perimetroToracico = $request->perimetroToracico;
        $objSomatometria->perimetroAbdominal = $request->perimetroAbdominal;
        $objSomatometria->pulso = $request->pulso;
        $objSomatometria->temperatura = $request->temperatura;
        $objSomatometria->frecuenciaCardiaca = $request->frecuenciaCardiaca;
        $objSomatometria->frecuenciaRespiratoria = $request->frecuenciaRespiratoria;
        $objSomatometria->talla = $request->talla;
        $objSomatometria->pesoPorTalla = $request->pesoPorTalla;
        $objSomatometria->tallaPorEdad = $request->tallaPorEdad;
        $objSomatometria->tensionArterial = $request->tensionArterial;
        $objSomatometria->glucemiaCapilar = $request->glucemiaCapilar;
        $objSomatometria->hemoglobinaCapitar = $request->hemoglobinaCapitar;
        $objSomatometria->cintura = $request->cintura;
        $objSomatometria->cadera = $request->cadera;
        $objSomatometria->indiceCinturaCadera = $request->indiceCinturaCadera;
        $objSomatometria->indiceMasaCorporal = $request->indiceMasaCorporal;
        $objSomatometria->userCapture = $request->userCapture;
        $objSomatometria->userUpdate = $request->userUpdate;
       // $objSomatometria->pacientes_curp = $request->pacientes_curp;
        
        $objSomatometria->integer('pacientes_curp')->unsigned();
        $objSomatometria->foreign('pacientes_curp')
                        ->references('curp')->on('pacientes');


        if ($objSomatometria->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Se guardó con éxito'
            ], 200);

        }else {
            return response()->json([
                'success' => false,
                'message' => 'Ups! Ha ocurrido un error'
            ], 401);
        }

    }
}
