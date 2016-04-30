<?php namespace App\Http\Controllers;

use App\Subcategoria;
use App\Evento;
use Illuminate\Http\Request;
class SubcategoriaEventoController extends Controller
{
    public function index($subcategoria_id)
    {
    	$subcategoria = Subcategoria::find($subcategoria_id);
        if ($subcategoria) 
        {
            $eventos = $subcategoria->eventos;

            return $this->crearRespuesta($eventos,200);
        }
        return $this->crearRespuestError("no se encontro esa subcategoria", 404);
    }
    public function store(Request $request, $subcategoria_id)
    {
    	$subcategoria = Subcategoria::find($subcategoria_id);
        if ($subcategoria) 
        {
            $this->validacion($request);
            $campos = $request->all();
            $campos['subcategoria_id'] = $subcategoria_id;
            Evento::create($campos);
            return $this->crearRespuesta("el evento se ha creado satisfactoriamente",200);
        }
        return $this->crearRespuestaError("No existe un id con esa respuesta", 404);
    }
    
    public function update()
    {
    	return "saludos desde update@subcategoriaController";
    }
    public function destroy()
    {
    	return "saludos desde destroy@subcategoriaController";
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
            'imagen_e' => 'required'
        ];

        $this->validate($request, $reglas);
    }
}
