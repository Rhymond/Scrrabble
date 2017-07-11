<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'winner_id' => 'required|different:looser_id|integer|min:0',
            'looser_id' => 'required|different:winner_id|integer|min:0',
            'winner_score' => 'required|integer|min:0',
            'looser_score' => 'required|integer|min:0'
        ];
    }
}
