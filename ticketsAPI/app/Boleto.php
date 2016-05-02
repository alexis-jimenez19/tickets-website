<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    //u stands for user
    protected $fillable = ['nombre_b','precio_b','cantidad_b_disponibles', 'numero_referencia','evento_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'boletos';

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