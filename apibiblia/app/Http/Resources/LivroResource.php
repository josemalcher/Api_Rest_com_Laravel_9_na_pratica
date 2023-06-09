<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'posicao' => $this->posicao,
            'nome' => $this->nome,
            'abreviacao' => $this->abreviacao,
            'testamento' => new TestamentoResource  ($this->whenLoaded('testamento')),
            'versiculos' => new VersiculosCollection($this->whenLoaded('versiculos')),
            'versao'     => new VersaoResource      ($this->whenLoaded('versao')),
            'links' => [
                [
                    'rel' => 'Alterar um livro',
                    'type' => 'PUT',
                    'link' => route('livro.update', $this->id)
                ],
                [
                    'rel' => 'Excluir um livro',
                    'type' => 'DELETE',
                    'link' => route('livro.destroy', $this->id)
                ]
            ]
        ];
    }
}
