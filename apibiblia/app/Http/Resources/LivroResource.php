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
            'testamento' => $this->whenLoaded('testamento'),
            'versiculo' => $this->whenLoaded('versiculo'),
            'versao' => new VersaoResource( $this->whenLoaded('versao')),

        ];
    }
}
