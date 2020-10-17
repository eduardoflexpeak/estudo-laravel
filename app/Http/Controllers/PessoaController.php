<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        // $pessoas = \App\Pessoa::all();
        $pessoas = Pessoa::paginate(10);

        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.form');
    }

    public function store(Request $request)
    {
        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;
        $pessoa->email = $request->email;

        $pessoa->save();

        return redirect('/pessoas');
    }

    public function show($id)
    {
        $pessoa = Pessoa::find($id);

        return view('pessoas.show', compact('pessoa'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::find($id);

        return view('pessoas.form', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);

        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;
        $pessoa->email = $request->email;

        $pessoa->save();

        return redirect('/pessoas');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);

        $pessoa->delete();

        return redirect('/pessoas');
    }
}
