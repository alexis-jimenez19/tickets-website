<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //u stands for user
    protected $fillable = ['nombre_r'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'roles';

	public function administradores()
    {
    	return $this->hasMany('App\Administrador');
    }
    
    /*
	public function ()
    {
    	return $this->('App\ ');
    }
    */
}