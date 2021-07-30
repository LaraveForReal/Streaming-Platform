<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
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
            'name' => 'required|string|min:3|max:60',
            'stream_url' => 'required|string',
            'start_datetime' => 'required|string|date_format:Y-m-d H:i:s',
            'end_datetime' => 'required|string|date_format:Y-m-d H:i:s',
        ];
    }
}
