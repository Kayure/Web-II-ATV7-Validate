<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;
use App\Models\Especialidade;


class VeterinarioController extends Controller {
    
    

    
    public function index() {
        
        $dados = Veterinario::with(['especialidade']) -> get();
        $clinica = "VetClin DWII";

        // Passa um array "dados" com os "clientes" e a string "clínicas"
        return view('veterinarios.index', compact(['dados', 'clinica']));
        // return view('cliente.index')->with('dados', $dados)->with('clinica', $clinica);
    }

    public function create() {

        $dados = Especialidade::all();

        return view('veterinarios.create', compact(['dados']));
    }

   public function store(Request $request) {
    $regras = [
        'nome' => 'required|max:100|min:10',
        'crmv' => 'required|max:10|min:5|unique:veterinarios',
        'especialidade' => 'required',
    ];

    $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
    ];

    $request->validate($regras, $msgs);


    Veterinario::create([
        'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        'crmv' => $request->crmv,
        'especialidade_id' => $request->especialidade,
    ]);
    
        return redirect()->route('veterinarios.index');
    }

    public function show($id) {
        
        $dados = Veterinario::find($id);

        if (!isset($dados)) {
            return "<h1>ID: $id não encontrado!</h1>";
        }

        return view('veterinarios.show', compact('dados'));
    }

    public function edit($id) {

        $aux =Veterinario::find($id);

        if(!isset($aux)){
            return "<h1> Id nao encontrado <h1>";
        }
            
          

        return view('veterinarios.edit', compact('dados'));        
    }

    public function update(Request $request, $id)
    {
        $aux = Veterinario::find($id);

        if (!isset($aux)) {
            return "<h1>ID: $id não encontrado!";
        }

        $aux->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'crmv' => $request->crmv,
            'especialidade_id' => 1,
        ]);

        $aux->save();

        return redirect()->route('veterinarios.edit');
    }

    public function destroy($id) {

        $aux = Veterinario::find($id);

        if(!isset($aux)){
            return "<h1> ID nao encontrado </h1>";
        }

        $aux -> destroy($id);

        return redirect()->route('veterinarios.index');
    }
}
