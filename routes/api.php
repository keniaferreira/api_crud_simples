<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Rota de usuário. Criada pelo Laravel no momento da criação do projeto.
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas que criamos no namespace Api.
Route::namespace('Api')->group(function(){

	//Rotas de Produtos
	Route::prefix('produtos')->group(function(){
		//Visualizar os produtos
		Route::get('/','ProdutoController@index');
		//Visualizar um produto específico
		Route::get('/{id}','ProdutoController@show');
		//Inserir um produto
		Route::post('/','ProdutoController@save');
		//Atualizar um produto
		Route::put('/','ProdutoController@update');
		//Atualizar parcialmente um produto
		Route::patch('/','ProdutoController@update');
		//Deletar um produto
		Route::delete('/{id}','ProdutoController@delete');

	});

	Route::resource('/users','UserController');
	
	
});
