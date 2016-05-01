<?php namespace App\Http\Controllers;

use App\Boleto;
use App\Evento;
use Illuminate\Http\Request;

class BoletoEventoController extends Controller
{
    public function index($evento_id)
    {
        $evento = Evento::find($evento_id);
        if ($evento) 
        {
            $boletos = $evento->boletos;
            return $this->crearRespuesta($boletos,200);
        }
        return $this->crearRespuestaError("No existe el evento con el id dado", 404);
    }
    
    public function store(Request $request, $evento_id)
    {
        $evento = Evento::find($evento_id);
        if ($evento) 
        {
            $this->validacion($request);
            $campos = $request->all();
            $campos['evento_id'] = $evento_id;
            Boleto::create($campos);
            return $this->crearRespuesta("el boleto se ha creado satisfactoriamente",200);

        }
        
        return $this->crearRespuestaError("no existe evento con id dado",404);
    }
    
    public function update(Request $request, $evento_id, $boleto_id)
    {
        $this->validacion($request);
        $evento = Evento::find($evento_id);
        if ($evento) 
        {
            $boleto = Boleto::find($boleto_id);
            if ($boleto) 
            {
                $boleto->titulo = $request->get("titulo");
                $boleto->descripcion = $request->get("descripcion");
                $boleto->valor = $request->get("valor");
                $boleto->evento_id = $evento_id;
                $boleto->save();
                return $this->crearRespuesta("Se ha actualizado el boleto", 200);
            }
            return $this->crearRespuestaError("no existe boleto con id dado",404);
        }
        return $this->crearRespuestaError("no existe evento con id dado",404);
    }

    public function show()
    {
        return "Estas en show de BoletoEstudianteController";
    }

    public function destroy($evento_id,$boleto_id)
    {
        $evento = Evento::find($evento_id);
        if ($evento) {
            $boletos = $evento->boletos();
            if ($boletos->find($boleto_id)) {
                $boleto = Boleto::find($boleto_id);
                $boleto->estudiantes()->detach();
                $boleto->delete();
                return $this->crearRespuesta("Boleto eliminado",200);
            }
            return $this->crearRespuestaError("El boleto no existe con id dado",404);
        }
        return $this->crearRespuestaError("no existe evento con id dado",404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'nombre_b' => 'required',
            'precio_b' => 'required|numeric',
            'cantidad_b' => 'required|numeric',
            'numero_r' => 'required' 
        ];

        $this->validate($request, $reglas);
    }
}
