<?php namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return $this->crearRespuesta($categorias, 200);
    }
    
    public function show($id)
    {
        $categorias = Categoria::find($id);
        if($categorias)
        {
            return $this->crearRespuesta($categorias,200);
        }

        return $this->crearRespuestaError("No existe el categorias. No fue encontrado.",404);
    }

    public function store(Request $request)
    {
        $this->validacion($request);        
        Categoria::create($request->all());

        return $this->crearRespuesta("El categorias ha sido creado",201);
    }
    
    public function update(Request $request, $categoria_id)
    {
        $categorias = Categoria::find($categoria_id);
        if($categorias)
        {
            $this->validacion($request);

            $nombre_c = $request->get('nombre_c');

            $categorias->nombre_c = $nombre_c;

            $categorias->save();

            return $this->crearRespuesta("El categorias $categorias->id - $categorias->nombre se ha actualizado",200);
        }
        return $this->crearRespuestaError("El id especificado no corresponde a ningun categorias", 404);
    }


    public function destroy($categoria_id)
    {
        $categorias = Categoria::find($categoria_id);
        if ($categorias) 
        {
            if(sizeof($categorias->cursos) > 0)
            {
                return $this->crearRespuestaError("El rol tiene administradores asociados",409);
            }
            
            $categorias->delete();
            return $this->crearRespuesta("el $categorias->id ha sido eliminado",200);
        }
        return $this->crearRespuestaError("No existe el categorias",404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_c' => 'required',
        ];
        $this->validate($request, $reglas);
    }
    
}
