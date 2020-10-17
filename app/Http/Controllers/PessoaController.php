<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        // $pessoas = \App\Pessoa::all();
        $pessoas = \App\Pessoa::paginate(10);

        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.form');
    }

    public function store(Request $request)
    {
        $pessoa = new \App\Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;
        $pessoa->email = $request->email;

        $pessoa->save();

        return redirect('/pessoas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
