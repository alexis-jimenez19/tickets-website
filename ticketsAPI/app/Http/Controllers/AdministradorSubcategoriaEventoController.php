<?php namespace App\Http\Controllers;

use App\Subcategoria;
use App\Evento;
use App\Administrador;
use Illuminate\Http\Request;

class AdministradorSubcategoriaEventoController extends Controller
{
	public function store(Request $request, $administrador_id, $subcategoria_id)
    {
    	$administrador = Administrador::find($administrador_id);
    	if ($administrador) {
    		$subcategoria = Subcategoria::find($subcategoria_id);
	        if ($subcategoria) 
	        {
				$this->validacion($request);
				$campos = $request->all();
				$campos['subcategoria_id'] = $subcategoria_id;
				$campos['administrador_id'] = $administrador_id;
				Evento::create($campos);
				return $this->crearRespuesta("El evento ha sido creado",201);
	        }
	        return $this->crearRespuestaError("No existe una categoria id con esa respuesta", 404);
    	}
    	return $this->crearRespuestaError("No existe una categoria id con esa respuesta", 404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_e' => 'required',
            'ciudad_e' => 'required',
            'estado_e' => 'required',
            'pais_e' => 'required',
            'lugar_e' => 'required',
            'fecha_e' => 'required',
            'hora_e' => 'required',
            'inicio_venta' => 'required',
            'imagen_e' => 'required',
        ];

        $this->validate($request, $reglas);
    }
}
