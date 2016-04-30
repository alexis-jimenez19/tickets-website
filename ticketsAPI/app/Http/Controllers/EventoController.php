<?php namespace App\Http\Controllers;

use App\Evento;

class EventoController extends Controller
{
    public function index()
    {
    	$eventos = Evento::all();
    	return $this->crearRespuesta($eventos, 200);
    }

    public function show($id)
    {
    	
    	$evento = Evento::find($id);
    	if ($evento) {
    		return $this->crearRespuesta($evento, 200);
    	}
    	return $this->crearRespuestaError("No existe evento con ese id", 404);
    }

}
