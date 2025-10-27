<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'sometimes|in:pendiente,en_progreso,completada',
            'fecha_vencimiento' => 'nullable|date',
            'priority_id' => 'required|exists:priorities,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Valida que cada ID de tag exista en la tabla de tags
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El campo título es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'priority_id.required' => 'Debe seleccionar una prioridad.',
            'priority_id.exists' => 'La prioridad seleccionada no es válida.',
            'tags.*.exists' => 'Una o más de las etiquetas seleccionadas no son válidas.',
        ];
    }
}
