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
   
    
    public function update(Request $request, $subcategoria_id, $evento_id)
    {
        $subcategoria = Subcategoria::find($subcategoria_id);
        if ($subcategoria) 
        {
            $evento = Evento::find($evento_id);
            //return $this->crearRespuestaError("$evento_id", 404);
            if ($evento) 
            {
                $evento->nombre_e = $request->get("nombre_e");
                $evento->ciudad_e = $request->get("ciudad_e");
                $evento->estado_e = $request->get("estado_e");
                $evento->pais_e = $request->get("pais_e");
                $evento->lugar_e = $request->get("lugar_e");
                $evento->fecha_e = $request->get("fecha_e");
                $evento->hora_e = $request->get("hora_e");
                $evento->inicio_venta = $request->get("inicio_venta");
                $evento->imagen_e = $request->get("imagen_e");
                $evento->subcategoria_id = $subcategoria_id;
                $evento->save();
                return $this->crearRespuesta("Se ha actualizado", 201);
            }
            return $this->crearRespuestaError("no se encontro ese vento", 404);
        }
        return $this->crearRespuestaError("no se encontro esa subcategoria", 404);
    }
    /*
    public function destroy()
    {
    	return "saludos desde destroy@subcategoriaController";
         'nombre_e' => 'required',
            'ciudad_e' => 'required',
            'estado_e' => 'required',
            'pais_e' => 'required',
            'lugar_e' => 'required',
            'fecha_e' => 'required',
            'hora_e' => 'required',
            'inicio_venta' => 'required',
            'imagen_e' => 'required',
    }
    */

  
}
