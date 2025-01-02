@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6">Gerenciamento de Tarefas</h1>

    @if(session('success'))
        <div class="bg-gray-100 text-gray-700 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">Lista de Tarefas</h3>
                <a href="{{ route('tarefas.create') }}" class="text-blue-600 hover:text-blue-900">Adicionar Nova Tarefa</a>
            </div>
        </div>

        <div class="border-t border-gray-200">
            <dl>
                @foreach ($tarefas as $tarefa)
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Título</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $tarefa->titulo }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Data de Vencimento</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            {{ \Carbon\Carbon::parse($tarefa->data_vencimento)->format('d/m/Y') }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if($tarefa->concluida)
                                Concluída
                            @else
                                Vencida
                            @endif
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Ações</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a> |
                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                            </form>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</div>
@endsection
