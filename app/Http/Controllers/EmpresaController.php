<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\EmpresaRequest;
use App\Services\EmpresaService;
use Illuminate\Support\Facades\Lang;

class EmpresaController extends Controller
{

    private $empresaService;

    public function __construct(EmpresaService $empresaService, Empresa $empresa)
    {
        $this->middleware('auth');
        $this->empresaService = $empresaService;
    }

    public function index()
    {
        $empresas = $this->empresaService->getEmpresaRepository()->all();

        return view('empresa.empresa-index', compact('empresas'));
    }

    public function create()
    {
        return view('empresa.empresa-create');
    }

    public function store(EmpresaRequest $request)
    {
        $this->empresaService->create();

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-inserido-sucesso"));

        return redirect()->action('EmpresaController@index');
    }

    public function show(Empresa $empresa)
    {
        //
    }

    public function edit(Empresa $empresa)
    {
        return view('empresa.empresa-edit', compact('empresa'));
    }

    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $this->empresaService->update($empresa);

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-alterado-sucesso"));

        return redirect()->action("EmpresaController@index");
    }

    public function destroy(Empresa $empresa)
    {
        $this->empresaService->getEmpresaRepository()->delete($empresa);

        session()->flash('menssagem-sucesso', Lang::get("geral.registro-removido-sucesso"));

        return redirect()->route('empresa');
    }
}
