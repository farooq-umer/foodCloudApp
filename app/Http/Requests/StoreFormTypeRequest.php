<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /*
         * Check if the authenticated user actually has the authority to create/update a given resource.
         *
         * If the authorize method returns false, a HTTP response with a 403 status code
         * will automatically be returned and your controller method will not execute.
         * If you plan to have authorization logic in another part of your application,
         * return true from the authorize method:
        */

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
            'form_type_name' => 'required|string|distinct|min:6|regex:/^[A-Za-z0-9 _.-]*$/',
            'form_type_code' => 'required|string|distinct|min:3|regex:/^[A-Za-z0-9 _.-]*$/'
        ];
    }
}
