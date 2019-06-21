<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProdutoFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoCollection; //Declarando o uso do resource criado.
use App\Http\Resources\ProdutoResource; //Declarando o uso da Collection criada.
use App\Produto;


class ProdutoController extends Controller
{
	/**
	*@var Produto
	*/
	private $produto;

    public function __construct(Produto $produto)
    {
    	$this->produto = $produto;
    }

    //Visualizando um Json com os produtos
    public function index()
    {
    	//$produto = $this->produto->all(); //Exibe todos os produtos

        $produtos = $this->produto->paginate(1); //Exibe os produtos paginados -> 1 item por página

    	//return response()->json($produto);

        //Utilizando ProdutoCollection.php para retornar os produtos
        return new ProdutoCollection($produtos);
    }

    //Visualizar produto específico
    public function show($id)
    {
        $produto = $this->produto->find($id);

        //return response()->json($produto);

        //Utilizando ProdudoResource.php para exibir os dados dos produtos
        return new ProdutoResource($produto);
    }

    //Salvar um produto
    public function save(ProdutoFormRequest $request)
    {
        $data = $request->all();
        $produto = $this->produto->create($data);

        return response()->json($produto);

    }

    //Atualizar um produto pelo id
    public function update(Request $request)
    {

        $data = $request->all();

        $produto = $this->produto->find($data['id']);
        $produto->update($data);

        return response()->json($produto);

    }

    public function delete($id)
    {

        $produto = $this->produto->find($id);
        $produto->delete();

        return response()->json(['data' => ['msg' => 'O produto foi removido com sucesso"']]);

    }
}
