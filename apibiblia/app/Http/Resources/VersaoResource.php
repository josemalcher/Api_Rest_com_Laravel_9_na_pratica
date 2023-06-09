<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VersaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'abreviacao' => $this->abreviacao,
            'idioma' => new IdiomaResource  ($this->whenLoaded('idioma')),
            'livros' => new LivrosCollection($this->whenLoaded('livros')),
            'links' => [
                [
                    'rel' => 'Alterar um versao',
                    'type' => 'PUT',
                    'link' => route('versao.update', $this->id)
                ],
                [
                    'rel' => 'Excluir um versao',
                    'type' => 'DELETE',
                    'link' => route('versao.destroy', $this->id)
                ]
            ]
        ];
    }
}
