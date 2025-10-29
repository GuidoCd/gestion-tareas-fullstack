<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $task = $this->route('task');
        return $this->user()->id === $task->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Si se incluye 'titulo', DEBE tener contenido.
            'titulo' => 'sometimes|required|string|max:255',
            
            // Si se incluye 'descripcion', DEBE tener contenido.
            'descripcion' => 'sometimes|required|string',

            'estado' => 'sometimes|in:pendiente,en_progreso,completada',
            'fecha_vencimiento' => 'nullable|date',

            // Si se incluye 'priority_id', DEBE existir.
            'priority_id' => 'sometimes|required|exists:priorities,id',

            'tags' => 'sometimes|array',
            'tags.*' => 'exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [
            // Mensajes para los campos que ahora son requeridos (si se envían)
            'titulo.required' => 'El campo título es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'priority_id.required' => 'Debe seleccionar una prioridad.',

            // Mensajes para las reglas de existencia que ya teníamos
            'priority_id.exists' => 'La prioridad seleccionada no es válida.',
            'tags.*.exists' => 'Una o más de las etiquetas seleccionadas no son válidas.',
        ];
    }
}
