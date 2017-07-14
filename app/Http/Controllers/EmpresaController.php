<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\EmpresaRequest;
use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmpresaRepository $empresaRepository)
    {
        $empresas = $empresaRepository->all();

        return view('empresa.empresa-index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.empresa-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request, EmpresaRepository $empresaRepository)
    {
        $novaEmpresa = $request->all();
        $empresaRepository->create($novaEmpresa);

        session()->flash('menssagem-sucesso', 'Empresa incluida com sucesso!');

        return redirect()->action('EmpresaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.empresa-edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->all());

        session()->flash('menssagem-sucesso', 'Empresa alterada com sucesso!');

        return redirect()->action("EmpresaController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        session()->flash('menssagem-sucesso', 'Empresa removida com sucesso!');

        return redirect()->route('empresa');
    }
}
