<?php namespace App\Http\Controllers;

use App\Rol;
use App\Administrador;
use Illuminate\Http\Request;

class RolAdministradorController extends Controller
{
    public function index($rol_id)
    {
        $rol = Rol::find($rol_id);
        if ($rol) 
        {
            $administradores = $rol->administradores;
            return $this->crearRespuesta($administradores, 200);
        }
        return $this->crearRespuestaError("no existe un rol con ese id", 404);        
    }

    public function store(Request $request, $rol_id)
    {
    	$rol = Rol::find($rol_id);
        if ($rol) {
            $this->validacion($request);
            $campos = $request->all();
            $campos['rol_id'] = $rol_id;
            Administrador::create($campos);
            return $this->crearRespuesta("el administrador se ha creado satisfactoriamente",200);

        }
        
        return $this->crearRespuestaError("no existe el rol con id dado",404);
    }

    /*
    public function show($rol_id,$administrador_id)
    {
    	$rol = Rol::find($rol_id);
        if ($rol) 
        {
            $administradores = $rol->administradores();
            if ($administrador->find($administrador_id)) 
            {
                
            }
            return $this->crearRespuesta($administradores, 200);
        }
        return $this->crearRespuestaError("no existe un rol con ese id", 404);        
    }
    */
    public function update(Request $request, $rol_id, $administrador_id)
    {
        $this->validacion($request);
        $rol = Rol::find($rol_id);
        if ($rol) 
        {
            $administrador = Administrador::find($administrador_id);
            if ($administrador) 
            {
                $administrador->nombre_a = $request->get('nombre_a');
                $administrador->apellido_a = $request->get('apellido_a');
                $administrador->correo_a = $request->get('correo_a');
                $administrador->username_a = $request->get('username_a');
                $administrador->password_a = $request->get('password_a');
                $administrador->pais_a = $request->get('pais_a');
                $administrador->estado_a = $request->get('estado_a');
                $administrador->direccion_a = $request->get('direccion_a');
                $administrador->telefono_a = $request->get('telefono_a');
                $administrador->celular_a = $request->get('celular_a');
                $administrador->rol_id = $rol_id;
                $administrador->save();
                return $this->crearRespuesta("Se ha actualizado el administrador", 200);
            }
            return $this->crearRespuestaError("no existe administrador con id dado",404);
        }
        return $this->crearRespuestaError("no existe rol con id dado",404);
    }
    
    

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_a' => 'required',
            'apellido_a' => 'required',
            'correo_a' => 'required',
            'username_a' => 'required',
            'password_a' => 'required',
            'pais_a' => 'required',
            'estado_a' => 'required',
            'direccion_a' => 'required',
        ];
        $this->validate($request, $reglas);
    }
}
