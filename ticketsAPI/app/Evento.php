<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //u stands for user
    protected $fillable = ['nombre_e','ciudad_e','estado_e', 'pais_e','lugar_e','fecha_e','hora_e','inicio_venta','imagen_e','subcategoria_id','administrador_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'eventos';

    public function administrador()
    {
    	return $this->belongsTo('App\Administrador');
    }

    public function boletos()
    {
    	return $this->hasMany('App\Boleto');
    }

    
	public function subcategoria()
    {
    	return $this->belongsTo('App\Subcategoria');
    }
    
    public function boletosclientes()
    {
        return $this->hasMany('App\BoletoCliente');
    }
    /*
	public function ()
    {
    	return $this->('App\ ');
    }
    */
}