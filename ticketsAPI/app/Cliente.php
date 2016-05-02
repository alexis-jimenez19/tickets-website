<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //u stands for user
    protected $fillable = ['nombre_u','apellido_u','correo_u', 'password_u','pais_u','estado_u','direccion_u','telefono_u','celular_u'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'clientes';
    
    public function boletos()
    {
    	return $this->belongsToMany('App\BoletoCliente');
    }
    
    /*
    public function ()
    {
    	return $this->('App\ ');
    }
    */
}