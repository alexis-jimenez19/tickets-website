<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    //u stands for user
    protected $fillable = ['nombre_b','precio_b','cantidad_b', 'numero_r','evento_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'boletos';

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