<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaJuridicaRequest extends FormRequest
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
        $this->sanitize();

        return [
            'nome_fantasia'=>'required|min:5',
            'cnpj'=>'required|min:18',
            'email'=>'required|min:5',
            'telefone'=>'required|min:12',
        ];
    }

    public function sanitize()
    {
        $input['razao_social'] = request('razao_social');
        $input['nome_fantasia'] = request('nome_fantasia');
        $input['cnpj'] = preg_replace("/[^0-9]/","",request('cnpj'));
        $input['nome_pessoa_contato'] = request('nome_pessoa_contato');
        $input['email'] = request('email');
        $input['telefone'] = preg_replace("/[^0-9]/","",request('telefone'));
        $input['cep'] = preg_replace("/[^0-9]/","",request('cep'));
        $input['logradouro'] = request('logradouro');
        $input['numero'] = request('numero');
        $input['bairro'] = request('bairro');
        $input['id_cidade'] = request('cidade');

        $this->replace($input);

    }
}
