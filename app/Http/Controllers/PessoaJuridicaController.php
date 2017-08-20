<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaJuridicaRequest;
use App\Models\Cidade;
use App\Models\PessoaJuridica;
use App\Services\PessoaJuridicaService;
use Illuminate\Support\Facades\Lang;

class PessoaJuridicaController extends Controller
{

    private $pessoaJuridicaService;

    public function __construct(PessoaJuridicaService $pessoaJuridicaService, PessoaJuridica $pessoaJuridica)
    {
        $this->middleware('auth');
        $this->pessoaJuridicaService = $pessoaJuridicaService;
    }

    public function index()
    {
        $listaPessoaJuridica = $this->pessoaJuridicaService->getPessoaJuridicaRepository()->paginate();

        return view('pessoa-juridica.pessoa-juridica-index', compact('listaPessoaJuridica'));
    }

    public function create()
    {
        $estados = $this->pessoaJuridicaService->getEstadoRepository()->retornarColecaoTodosEstados();
//        $estado = $this->pessoaJuridicaService->getEstadoRepository()->find(1);
//        return $estado->getCidades()->getQuery()->get(['id', 'nome']);
        $cidades = array();
        if(!empty(old('estado'))) {
            $estado = $this->pessoaJuridicaService->getEstadoRepository()->find(old('estado'));
            $cidades = $estado->getCidades()->pluck('nome','id');
//            dd($cidades);
        }
        return view('pessoa-juridica.pessoa-juridica-create', compact('estados', 'cidades'));
    }

    public function store(PessoaJuridicaRequest $request)
    {
        $this->pessoaJuridicaService->create();

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

    public function getCidades($idEstado)
    {
        $estado = $this->pessoaJuridicaService->getEstadoRepository()->find($idEstado);
        return $estado->getCidades()->getQuery()->get(['id', 'nome']);
    }
}
