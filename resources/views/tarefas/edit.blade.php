@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6">Editar Tarefa</h1>

    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use o método PUT para atualizar a tarefa -->
        
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 font-bold mb-2">Título:</label>
            <input type="text" id="titulo" name="titulo" class="w-full border border-gray-300 p-2 rounded" value="{{ old('titulo', $tarefa->titulo) }}" required>
        </div>

        <div class="mb-4">
            <label for="data_vencimento" class="block text-gray-700 font-bold mb-2">Data de Vencimento:</label>
            <input type="date" id="data_vencimento" name="data_vencimento" class="w-full border border-gray-300 p-2 rounded"
                value="{{ old('data_vencimento', $tarefa->data_vencimento ? \Carbon\Carbon::parse($tarefa->data_vencimento)->format('Y-m-d') : '') }}" required>
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-gray-700 font-bold mb-2">Categoria:</label>
            <select id="categoria_id" name="categoria_id" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $tarefa->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="concluida" class="inline-flex items-center text-gray-700 font-bold">
                <input type="checkbox" id="concluida" name="concluida" value="1" {{ $tarefa->concluida ? 'checked' : '' }} class="form-checkbox text-blue-500">
                <span class="ml-2">Tarefa Concluída</span>
            </label>
        </div>

        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Atualizar Tarefa
        </button>
    </form>
</div>
@endsection
