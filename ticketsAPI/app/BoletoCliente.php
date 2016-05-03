<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class BoletoCliente extends Model
{
    //u stands for user
    protected $fillable = ['cantidad_b_comprados', 'estatus_b','boleto_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'boletos_clientes';

    public function clientes()
    {
    	return $this->belongsToMany('App\Cliente');
    }

	public function evento()
    {
    	return $this->belongsTo('App\Evento');
    }

    public function boletopadre()
    {
        return $this->belongsTo('App\Boleto');
    }
    /*
    public function ()
    {
    	return $this->('App\ ');
    }
    */
}