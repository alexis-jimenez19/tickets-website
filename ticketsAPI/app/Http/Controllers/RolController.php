<?php namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
class RolController extends Controller
{
    
    public function index()
    {
        $roles = Rol::all();
        return $this->crearRespuesta($roles, 200);
    }
    
    public function show($id)
    {
        $roles = Rol::find($id);
        if($roles)
        {
            return $this->crearRespuesta($roles,200);
        }

        return $this->crearRespuestaError("No existe el roles. No fue encontrado.",404);
    }

    public function store(Request $request)
    {
        $this->validacion($request);        
        Rol::create($request->all());

        return $this->crearRespuesta("El roles ha sido creado",201);
    }
    
    public function update(Request $request, $rol_id)
    {
        $roles = Rol::find($rol_id);
        if($roles)
        {
            $this->validacion($request);

            $nombre_r = $request->get('nombre_r');

            $roles->nombre_r = $nombre_r;

            $roles->save();

            return $this->crearRespuesta("El roles  se ha actualizado",200);
        }
        return $this->crearRespuestaError("El id especificado no corresponde a ningun roles", 404);
    }


    public function destroy($rol_id)
    {
        $roles = Rol::find($rol_id);
        if ($roles) 
        {
            if(sizeof($roles->administradores) > 0)
            {
                return $this->crearRespuestaError("El rol tiene administradores asociados",409);
            }
            
            $roles->delete();
            return $this->crearRespuesta("el $roles->id ha sido eliminado",200);
        }
        return $this->crearRespuestaError("No existe el roles",404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_r' => 'required',
        ];
        $this->validate($request, $reglas);
    }
}
