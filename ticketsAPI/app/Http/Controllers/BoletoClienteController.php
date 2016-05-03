<?php namespace App\Http\Controllers;
use App\Cliente;
use App\BoletoCliente;
use App\Boleto;
use Illuminate\Http\Request;
class BoletoClienteController extends Controller
{
    public function index($cliente_id)
    {
    	$cliente = Cliente::find($cliente_id);
        if ($cliente) 
        {
            $boletos = $cliente->boletos;
            return $this->crearRespuesta($boletos, 200);
        }
        $this->crearRespuestaError("el cliente con id $cliente_id no existe", 404);
    }
    public function store(Request $request, $cliente_id)
    {
    	$cliente = Cliente::find($cliente_id);
        if ($cliente) 
        {
            $this->validacion($request);

            $boleto = Boleto::find($request->boleto_id);
            if ($boleto) 
            {
                $campos['boleto_id'] = $boleto->id;
                $campos['cantidad_b_comprados'] = $request->cantidad_b_comprados;
                $campos['estatus_b'] = "Pendiente";
                $boletocliente = BoletoCliente::create($campos);
                $cliente->boletos()->attach($boletocliente->id);
                return $this->crearRespuesta("$boletocliente->id", 201);
            }
            return $this->crearRespuestaError("boleto con este id no existe", 404);
        }
        return $this->crearRespuestaError("cliente con este id no existe", 404);
    }

    public function update($cliente_id, $boletocliente_id)
    {
        //necesito mandarle el id especifico del boleto que compro
        $cliente = Cliente::find($cliente_id);
        if ($cliente) 
        {
            $boletoscliente = $cliente->boletos;

            $boletoDeClienteSeleccionado = $boletoscliente->find($boletocliente_id);
            
            
            if ($boletoDeClienteSeleccionado) 
            {

                $bpadre = Boleto::find($boletoDeClienteSeleccionado->boleto_id);
                if($boletoDeClienteSeleccionado->estatus_b != 'Pagado')
                {
                    $boletoDeClienteSeleccionado->estatus_b = 'Pagado';
                    $bpadre->cantidad_b_disponibles = $bpadre->cantidad_b_disponibles - $boletoDeClienteSeleccionado->cantidad_b_comprados;
                    $bpadre->save();
                    $boletoDeClienteSeleccionado->save();
                    return $this->crearRespuesta("Se ha actualizado a pagado tu boleto $boletoDeClienteSeleccionado", 201);
                }
                
                return $this->crearRespuestaError("Ya se encuentra con estatus de pagado tu boleto", 409);
                
            }
            return $this->crearRespuestaError("No se encuentra ningun boleto comprado con dicho id", 404);
        }

        return $this->crearRespuestaError("No se encuentra el cliente con dicho codigo", 404);
    }


    public function show()
    {
    	return "saludos desde show@boletoClienteController";
    }

    public function destroy($cliente_id, $boleto_cliente_id)
    {
    	$cliente = Cliente::find($cliente_id);
        if ($cliente) {
            $boletoscliente = $cliente->boletos();
            $boletoDeClienteSeleccionado = $boletoscliente->find($boleto_cliente_id);

            if ($boletoDeClienteSeleccionado) 
            {
                $bpadre = Boleto::find($boletoDeClienteSeleccionado->boleto_id);
                $bpadre->cantidad_b_disponibles = $bpadre->cantidad_b_disponibles + $boletoDeClienteSeleccionado->cantidad_b_comprados;
                $bpadre->save();
                $boletoscliente->detach($boleto_cliente_id);
                $boletoscliente->detach($cliente_id);
                $boletoQueSeHabiaComprado = BoletoCliente::find($boleto_cliente_id);
                $boletoQueSeHabiaComprado->delete();
                return $this->crearRespuesta("Se ha eliminado",200);
            }
            return $this->crearRespuestaError("No existe el id de boleto comprado",404);
        }
        return $this->crearRespuestaError("No existe el cliente con el id dado",404);
    }

    public function validacion(Request $request)
    {
        $reglas = 
        [
            'boleto_id' => 'required|numeric',
            'cantidad_b_comprados' => 'required|numeric'           
        ];

        $this->validate($request, $reglas);
    }
}
/*
public function store(Request $request, $profesor_id)
    {
        $profesor = Profesor::find($profesor_id);
        if ($profesor) {
            $this->validacion($request);
            $campos = $request->all();
            $campos['profesor_id'] = $profesor_id;
            Curso::create($campos);
            return $this->crearRespuesta("el curso se ha creado satisfactoriamente",200);

        }
        
        return $this->crearRespuestaError("no existe profesor con id dado",404);
    }
*/
