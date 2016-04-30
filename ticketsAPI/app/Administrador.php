<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //u stands for user
    protected $fillable = ['nombre_a','apellido_a','correo_a', 'password_a','pais_a','estado_a','direccion_a','telefono_a','celular_a','rol_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'administradores';

    public function rol()
    {
    	return $this->belongsTo('App\Rol');
    }

    public function eventos()
    {
    	return $this->hasMany('App\Evento');
    }

    /*
    public function ()
    {
    	return $this->('App\ ');
    }
    */
}