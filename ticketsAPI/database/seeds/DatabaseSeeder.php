<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Administrador;
use App\Boleto;
use App\Categoria;
use App\Cliente;
use App\Evento;
use App\Rol;
use App\Subcategoria;
use App\BoletoCliente;

class DatabaseSeeder extends Seeder {

	/**use 
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Administrador::truncate();
		Evento::truncate();
		Boleto::truncate();
		Cliente::truncate();
		Categoria::truncate();
		Subcategoria::truncate();
		Rol::truncate();
		BoletoCliente::truncate();

		DB::table('roles')->insert(['nombre_r'=>'Super']);
		DB::table('roles')->insert(['nombre_r'=>'Profesional']);
		DB::table('roles')->insert(['nombre_r'=>'Personal']);
		DB::table('roles')->insert(['nombre_r'=>'Junior']);

		DB::table('categorias')->insert(['nombre_c'=>'Deportes']);
		DB::table('categorias')->insert(['nombre_c'=>'Conciertos']);
		DB::table('categorias')->insert(['nombre_c'=>'Teatro y Culturales']);

		DB::table('subcategorias')->insert(['nombre_sc'=>'Cabaret','categoria_id'=>'2']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Instrumental/Jazz','categoria_id'=>'2']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Pop/Romantica','categoria_id'=>'2']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Box/Lucha Libre','categoria_id'=>'1']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Béisbol','categoria_id'=>'1']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Fútbol','categoria_id'=>'1']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Tenis','categoria_id'=>'1']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Deportes Extremos','categoria_id'=>'1']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Ballet/Danza','categoria_id'=>'3']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Obras de teatro','categoria_id'=>'3']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Exhibiciones','categoria_id'=>'3']);
		DB::table('subcategorias')->insert(['nombre_sc'=>'Voces/Coros','categoria_id'=>'3']);

		factory(Administrador::class,20)->create();
		factory(Evento::class,30)->create();
		factory(Boleto::class,100)->create();
		factory(Cliente::class,50)->create();
		factory(BoletoCliente::class,100)->create();


		
	}

}
