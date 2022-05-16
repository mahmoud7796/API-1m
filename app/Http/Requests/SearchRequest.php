<?php

namespace App\Http\Requests;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    use ResponseJson;
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
        $madad = [
            'keyword' => 'required',

        ];

       // return $this->jsonResponseError(true,$madad,  200);
    }
    public function messages()
    {
        return [

        ];
    }
}
