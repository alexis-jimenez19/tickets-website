<?php namespace App\Http\Controllers;

use App\Categoria;
use App\Subcategoria;
use Illuminate\Http\Request;

class CategoriaSubcategoriaController extends Controller
{
    public function index($categoria_id)
    {
        
        $categoria = Categoria::find($categoria_id);
        if ($categoria) {
            $subcategorias = $categoria->subcategorias;
            return $this->crearRespuesta($subcategorias, 200);
        }
        return $this->crearRespuestaError("No existe una categoria conese id", 404);   
    }
    
    public function store(Request $request,$categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        $this->validacion($request);        

        if ($categoria) 
        {
            $campos = $request->all();
            $campos['categoria_id'] = $categoria_id;
            Subcategoria::create($campos);
            return $this->crearRespuesta("El subcategoria ha sido creada",201);
        }
        return $this->crearRespuestaError("La categoria no existe",404);
    }
    
    public function update(Request $request, $categoria_id, $subcategoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        if ($categoria)
        {
            $subcategoria = Subcategoria::find($subcategoria_id);
            if ($subcategoria) 
            {
                $subcategoria->categoria_id = $categoria_id;
                $subcategoria->nombre_sc = $request->get("nombre_sc");
                $subcategoria->save();
                return $this->crearRespuesta("La subcategoria  con id = $subcategoria->id se ha actualizado", 201);
            }
            return $this->crearRespuestaError("La Subcategoria con ese Id no existe", 404);
        }
        return $this->crearRespuestaError("La categoria con ese Id no existe", 404);
    }


    

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_sc' => 'required',
        ];
        $this->validate($request, $reglas);
    }
}
