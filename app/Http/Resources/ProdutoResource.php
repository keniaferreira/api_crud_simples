<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Controle dos dados retornados
        return [

            'name' =>$this->name,
            'price' =>$this->price,
            'slug' => $this->slug
        ];
        
        //Retornar todos os dados
        //return $this->resource->toArray();
    }
}
