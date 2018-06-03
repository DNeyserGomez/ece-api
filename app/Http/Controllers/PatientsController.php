<?php


namespace App\Http\Controllers;
use DB;
use App\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller {

    function index(Request $request ) {

        if ($request->isJson()) {
            
            $patients = Patient::all();

            return response()->json($patients, 200);      
        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    function createUser(Request $request) {
        // $Neyser = DB::table('pacientes')->select('nombre')->get(); #obtiene los nombres de la tabla pacientes con la clase DB
        // dd($Neyser);

        // $saveData = DB::table('pacientes')->insert([ #isert con la clase DB
        //     [
        //         'curp' => $request->curp,
        //         'nombre' => $request->nombre
        //     ]
        // ]);
            $objPatient = new Patient;
            $objPatient->curp = $request->curp;
            $objPatient->nombre = $request->nombre;
            $objPatient->apellidoPaterno = $request->apellidoPaterno;
            $objPatient->apellidoMaterno = $request->apellidoMaterno;
            $objPatient->fechaNacimiento = $request->fechaNacimiento;
            $objPatient->sexo = $request->sexo;
            $objPatient->estadoCivil = $request->estadoCivil;
            $objPatient->edad = $request->edad;
            $objPatient->esIndigena = $request->esIndigena;
            $objPatient->escolaridad = $request->escolaridad;
            $objPatient->ocupacion = $request->ocupacion;
            $objPatient->religion = $request->religion;
            $objPatient->email = $request->email;
            $objPatient->nacionalidad = $request->nacionalidad;
            $objPatient->migrante = $request->migrante;
            $objPatient->numeroExpedienteFisico = $request->numeroExpedienteFisico;
            $objPatient->credencialElector = $request->credencialElector;
            $objPatient->grupoSanguineo = $request->grupoSanguineo;
            $objPatient->factorRH = $request->factorRH;
            $objPatient->discapacidadPaciente = $request->discapacidadPaciente;

            if ($objPatient->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Se guardo con éxito',
                    'patient' => $objPatient
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'ups! Ocurrió un error',
                    'patient' => $objPatient
                ],500);
            }
    }
}