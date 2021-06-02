<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubMenuItemRequest extends FormRequest
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
              'name' => 'required',
              'link' => 'required',
              'status' => 'required',
              'menu_item_id' => 'required',
              'target' => 'required',
              'icon' => '',
         ];
     }
}
