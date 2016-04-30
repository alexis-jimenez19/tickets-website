<?php namespace App\Http\Controllers;

use App\Administrador;

class AdministradorController extends Controller
{
    public function index()
    {
    	$administradores = Administrador::all();
    	return $this->crearRespuesta($administradores, 200);
    }
    
    
    public function show($id)
	{
		$administrador = Administrador::find($id);
		if($administrador)
		{
			return $this->crearRespuesta($administrador,200);
		}

		return $this->crearRespuestaError("No existe el administrador. No fue encontrado.",404);
	}
	
	public function destroy($administrador_id)
    {
        	$administrador = Administrador::find($administrador_id);
            if ($administrador) 
            {
                if(sizeof($administrador->eventos) > 0)
                {
                    //return "el administrador tiene eventos";
                    return $this->crearRespuestaError("El administrador tiene eventos asociados",409);
                }
                //return "el administrador puede eliminarse porq no tiene eventos";
                
                $administrador->delete();
                return $this->crearRespuesta("el $administrador->id ha sido eliminado",200);
            }
            return $this->crearRespuestaError("No existe el administrador",404);
           //return "no existe esa persona administradora";
    }
}

