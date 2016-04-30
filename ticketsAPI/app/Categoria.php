<?php  namespace App;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //u stands for user
    protected $fillable = ['nombre_c'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $table = 'categorias';

	public function subcategorias()
    {
    	return $this->hasMany('App\Subcategoria');
    }
    /*
    public function ()
    {
    	return $this->('App\ ');
    }
    */
}