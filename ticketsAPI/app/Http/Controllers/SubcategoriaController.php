<?php namespace App\Http\Controllers;

use App\Subcategoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
    	$subcategorias = Subcategoria::all();
        return $this->crearRespuesta($subcategorias,200);
    }
    
    public function show($id)
    {
    	$subcategoria = Subcategoria::find($id);
        if ($subcategoria) {
            return $this->crearRespuesta($subcategoria, 200);
        }
        return $this->crearRespuestaError("No se encontro dicha subcategoria", 404);
    }

    
    public function destroy($subcategoria_id)
    {
        $subcategoria = Subcategoria::find($subcategoria_id);
        if ($subcategoria) 
        {
            if(sizeof($subcategoria->eventos) > 0)
            {
                return $this->crearRespuestaError("La subcategoria tiene eventos asociados",409);
            }
            
            $subcategoria->delete();
            return $this->crearRespuesta("la subcategoria con id $subcategoria->id ha sido eliminada",200);
        }
        return $this->crearRespuestaError("No existe el subcategoria",404);
    }
}