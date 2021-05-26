<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'cliente_id'=>'required',
            'tipo_comprobante'=>'string|required|max:20',
            'serie_comprobante'=>'string|required|max:7',
            'num_comprobante'=>'string|max:10',
            'articulo_id'=>'required',
            'cantidad'=>'required',
            'precio_venta'=>'required',
            'descuento' => 'required',
            'total_venta'=> 'required'
        ];
    }
}
