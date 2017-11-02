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
        $idEstadoSelecionado = (!empty(old('id_cidade'))) ? $this->enderecoService->getCidadeRepository()->find(old('id_cidade'))->estado->id : null;
        $cidades = $this->enderecoService->popularEstadoCidadeInicial($idEstadoSelecionado);

        return view('pessoa-juridica.pessoa-juridica-create', compact('estados', 'cidades', 'idEstadoSelecionado'));
    }

    public function store(PessoaJuridicaRequest $request)
    {
        $this->pessoaJuridicaService->getPessoaJuridicaRepository()->create($request->all());

        session()->flash('mensagem-sucesso', Lang::get("geral.registro-inserido-sucesso"));

        return redirect()->action('PessoaJuridicaController@index');
    }

    public function show(PessoaJuridica $pessoaJuridica)
    {
        //
    }

    public function edit(PessoaJuridica $pessoaJuridica)
    {
        $estados = $this->enderecoService->getEstadoRepository()->retornarColecaoTodosEstados();
        $idEstadoSelecionado = $this->enderecoService->getCidadeRepository()->find(!empty(old('id_cidade')) ? old('id_cidade') : $pessoaJuridica->id_cidade)->estado->id;
        $cidades = $this->enderecoService->popularEstadoCidadeInicial($idEstadoSelecionado);

        return view('pessoa-juridica.pessoa-juridica-create', compact('pessoaJuridica', 'estados', 'cidades', 'idEstadoSelecionado'));
    }

    public function update(PessoaJuridicaRequest $request, PessoaJuridica $pessoaJuridica)
    {
        $this->pessoaJuridicaService->getPessoaJuridicaRepository()->update($pessoaJuridica, $request->all());

        session()->flash('mensagem-sucesso', Lang::get("geral.registro-alterado-sucesso"));

        return redirect()->action("PessoaJuridicaController@index");
    }

    public function destroy(PessoaJuridica $pessoaJuridica)
    {
        $this->pessoaJuridicaService->getPessoaJuridicaRepository()->delete($pessoaJuridica);

        session()->flash('mensagem-sucesso', Lang::get("geral.registro-removido-sucesso"));

        return redirect()->route('pessoa-juridica');
    }
}
