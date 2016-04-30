<?php namespace App\Http\Controllers;
use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
    	$clientes = Cliente::all();
        return $this->crearRespuesta($clientes, 200);
    }

    public function show($id)
    {
    	$cliente = Cliente::find($id);
        if ($cliente) 
        {
            return $this->crearRespuestaError($cliente, 200);
        }
        return $this->crearRespuestaError("No se encontro un cliente con id = $id", 404);
    }

    public function store(Request $request) 
    {
        $this->validacion($request);        
        Cliente::create($request->all());
        return $this->crearRespuesta("El cliente ha sido creado",201);
    }
    
    public function update(Request $request, $cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        if($cliente)
        {
            $this->validacion($request);

            $cliente->nombre_u = $request->get('nombre_u');
            $cliente->apellido_u = $request->get('apellido_u');
            $cliente->correo_u = $request->get('correo_u');
            $cliente->password_u = $request->get('password_u');
            $cliente->pais_u = $request->get('pais_u');
            $cliente->estado_u = $request->get('estado_u');
            $cliente->direccion_u = $request->get('direccion_u');
            $cliente->telefono_u = $request->get('telefono_u');
            $cliente->celular_u = $request->get('celular_u');

            $cliente->save();

            return $this->crearRespuesta("El cliente $cliente->id - $cliente->nombre_c se ha actualizado",200);
        }
        return $this->crearRespuestaError("El id especificado no corresponde a ningun cliente", 404);
    }


    public function destroy($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        if ($cliente) 
        {
            if(sizeof($cliente->cursos) > 0)
            {
                return $this->crearRespuestaError("El rol tiene administradores asociados",409);
            }
            
            $cliente->delete();
            return $this->crearRespuesta("el $cliente->id ha sido eliminado",200);
        }
        return $this->crearRespuestaError("No existe el cliente",404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_u' => 'required',
            'apellido_u' => 'required',
            'correo_u' => 'required',
            'password_u' => 'required',
            'pais_u' => 'required',
            'estado_u' => 'required',
            'direccion_u' => 'required',
            'telefono_u' => 'required',
            'celular_u' => 'required',
        ];
        $this->validate($request, $reglas);
    }
    
}
