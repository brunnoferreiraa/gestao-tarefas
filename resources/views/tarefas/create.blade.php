@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Adicionar Nova Tarefa</h2>

    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 font-bold mb-2">Título:</label>
            <input type="text" id="titulo" name="titulo" class="w-full border border-gray-300 p-2 rounded" 
                   value="{{ old('titulo') }}" placeholder="Digite o título da tarefa" required>
        </div>
        
        <div class="mb-4">
            <label for="data_vencimento" class="block text-gray-700 font-bold mb-2">Data de Vencimento:</label>
            <input type="date" id="data_vencimento" name="data_vencimento" class="w-full border border-gray-300 p-2 rounded" 
                   value="{{ old('data_vencimento') }}" required>
        </div>
        
        <div class="mb-4">
            <label for="categoria_id" class="block text-gray-700 font-bold mb-2">Categoria:</label>
            <select id="categoria_id" name="categoria_id" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="nova_categoria" class="block text-gray-700 font-bold mb-2">Ou adicionar nova categoria:</label>
            <input type="text" id="nova_categoria" name="nova_categoria" class="w-full border border-gray-300 p-2 rounded" 
                   value="{{ old('nova_categoria') }}" placeholder="Digite o nome da nova categoria">
        </div>

        <div class="flex justify-end gap-4">
          
            <a href="{{ route('tarefas.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition duration-200">
                Cancelar
            </a>

            <button type="submit" 
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition duration-200">
                Adicionar Tarefa
            </button>
        </div>
    </form>
</div>
@endsection
