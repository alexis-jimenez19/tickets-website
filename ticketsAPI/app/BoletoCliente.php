<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class BoletoCliente extends Model
{
    //u stands for user
    protected $fillable = ['nombre_b','precio_b','cantidad_b_comprados', 'evento_id', 'cliente_id','estatus_b'];

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
    /*
    public function ()
    {
    	return $this->('App\ ');
    }
    */
}