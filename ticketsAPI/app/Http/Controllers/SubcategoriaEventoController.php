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
                $evento->nombre_e = $evento->nombre_e;
                $evento->ciudad_e = $evento->ciudad_e;
                $evento->estado_e = $evento->estado_e;
                $evento->pais_e = $evento->pais_e;
                $evento->lugar_e = $evento->lugar_e;
                $evento->fecha_e = $evento->fecha_e;
                $evento->hora_e = $evento->hora_e;
                $evento->inicio_venta = $evento->inicio_venta;
                $evento->imagen_e  = $evento->imagen_e ;
                $evento->subcategoria_id = $subcategoria_id;
                $evento->save();
                return $this->crearRespuesta("Se ha actualizado", 201);
            }
            return $this->crearRespuestaError("no se encontro ese vento", 404);
        }
        return $this->crearRespuestaError("no se encontro esa subcategoria", 404);
    }  
}
