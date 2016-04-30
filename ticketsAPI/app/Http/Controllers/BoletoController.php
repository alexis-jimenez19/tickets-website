<?php namespace App\Http\Controllers;

use App\Boleto;

class BoletoController extends Controller
{
    public function index()
    {
        $boletos = Boleto::all();
        return $this->crearRespuesta($boletos, 200);
    }   
    
    public function show($id)
    {
        $boleto = Boleto::find($id);
        if($boleto)
        {
            return $this->crearRespuesta($boleto,200);
        }

        return $this->crearRespuestaError("No existe el boleto. No fue encontrado.",404);
    }
}
