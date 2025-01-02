<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all()->map(function ($tarefa) {
            // Verifica se a tarefa está vencida e não concluída
            $tarefa->vencida = !$tarefa->concluida && Carbon::parse($tarefa->data_vencimento)->isPast();
            return $tarefa;
        });

        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
{
    $categorias = Categoria::all();
    return view('tarefas.create', compact('categorias'));
}

public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'data_vencimento' => 'required|date',
        'categoria_id' => 'nullable|exists:categorias,id', 
        'nova_categoria' => 'nullable|string|max:255', 
    ]);

    if ($request->nova_categoria) {
        $categoria = Categoria::create([
            'nome' => $request->nova_categoria
        ]);
        $categoria_id = $categoria->id;
    } else {
        $categoria_id = $request->categoria_id;
    }

    Tarefa::create([
        'titulo' => $request->titulo,
        'data_vencimento' => $request->data_vencimento,
        'categoria_id' => $categoria_id
    ]);

    return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
}


    public function edit($id)
    {

    $tarefa = Tarefa::findOrFail($id);
    $categorias = Categoria::all(); 
    return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'data_vencimento' => 'required|date',
        ]);

        $tarefa->update($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
    }

    public function toggleStatus(Tarefa $tarefa)
    {
        $tarefa->concluida = !$tarefa->concluida; 
        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Status da tarefa atualizado com sucesso.');
    }
}
