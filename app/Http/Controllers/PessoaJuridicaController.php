<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaJuridicaRequest;
use App\Models\PessoaJuridica;
use App\Services\EnderecoService;
use App\Services\PessoaJuridicaService;
use Illuminate\Support\Facades\Lang;

class PessoaJuridicaController extends Controller
{

    private $pessoaJuridicaService;
    private $enderecoService;

    public function __construct(PessoaJuridicaService $pessoaJuridicaService, EnderecoService $enderecoService, PessoaJuridica $pessoaJuridica)
    {
        $this->middleware('auth');
        $this->pessoaJuridicaService = $pessoaJuridicaService;
        $this->enderecoService = $enderecoService;
    }

    public function index()
    {
        $listaPessoaJuridica = $this->pessoaJuridicaService->getPessoaJuridicaRepository()->paginate();

        return view('pessoa-juridica.pessoa-juridica-index', compact('listaPessoaJuridica'));
    }

    public function create()
    {
        $estados = $this->enderecoService->getEstadoRepository()->retornarColecaoTodosEstados();
        $cidades =  $this->enderecoService->popularEstadoCidadeInicial();

        return view('pessoa-juridica.pessoa-juridica-create', compact('estados', 'cidades'));
    }

    public function store(PessoaJuridicaRequest $request)
    {
        $this->pessoaJuridicaService->getPessoaJuridicaRepository()->create($request->all());

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-inserido-sucesso"));

        return redirect()->action('PessoaJuridicaController@index');
    }

    public function show(PessoaJuridica $pessoaJuridica)
    {
        //
    }

    public function edit(PessoaJuridica $pessoaJuridica)
    {
        return view('pessoa-juridica.pessoa-juridica-edit', compact('pessoaJuridica'));
    }

    public function update(PessoaJuridicaRequest $request, PessoaJuridica $pessoaJuridica)
    {
        $this->pessoaJuridicaService->update($pessoaJuridica);

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-alterado-sucesso"));

        return redirect()->action("PessoaJuridicaController@index");
    }

    public function destroy(PessoaJuridica $pessoaJuridica)
    {
        $this->pessoaJuridicaService->getPessoaJuridicaRepository()->delete($pessoaJuridica);

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-removido-sucesso"));

        return redirect()->route('pessoa-juridica');
    }
}
