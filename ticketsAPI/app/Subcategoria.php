<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    //u stands for user
    protected $fillable = ['nombre_sc','categoria_id'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'subcategorias';

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
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