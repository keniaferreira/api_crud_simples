<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

	protected $table = "produto"; // Setando a tabela criada no Banco de dados
	
	//carrega os campos da tabela produto
    protected $fillable = [
		'nome', 'preco', 'descricao', 'slug', 'estoque'
    ];
}
