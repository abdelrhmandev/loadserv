<?php
namespace App\Http\Requests\backend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class InvoiceRequest extends FormRequest
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


    public function rules()
    {
        ///MULTI Languages Inputs Validation///////////
        $id                         = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        $rules['title']             = 'required|unique:invoices,title,'.$id;
        $rules['amount']            = 'required|integer';
        $rules['date']              = 'required|date';
        $rules['image']             = 'nullable|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB

        return $rules;

    }





    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }

}
