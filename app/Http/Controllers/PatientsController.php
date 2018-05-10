<?php

namespace App\Http\Controllers;

class PatientsController extends Controller {

    function index() {
        return response()->json([], 200);
    }
}