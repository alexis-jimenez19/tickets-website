<?php namespace App\Http\Controllers;
use App\Cliente;
use App\BoletoCliente;


class BoletoClienteController extends Controller
{
    public function index($cliente_id)
    {
    	$cliente = Cliente::find($cliente_id);
        if ($cliente) 
        {
            $boletos = $cliente->boletos;
            return $this->crearRespuesta($cliente,409);
            return $this->crearRespuesta($boletos, 200);
        }
        $this->crearRespuestaError("el cliente con id $cliente_id no existe", 404);
    }
    public function store()
    {
    	return "saludos desde store@boletoClienteController";
    }
    public function show()
    {
    	return "saludos desde show@boletoClienteController";
    }

    public function destroy()
    {
    	return "saludos desde destroy@boletoClienteController";
    }
}
