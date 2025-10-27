<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'prioridad' => $this->whenLoaded('priority', function () {
                return $this->priority->prioridad;
            }),
            'etiquetas' => $this->whenLoaded('tags', function () {
                return $this->tags->pluck('etiqueta');
            }),
            'creado_en' => $this->created_at->toIso8601String(),
            'actualizado_en' => $this->updated_at->toIso8601String(),
        ];
    }
}
