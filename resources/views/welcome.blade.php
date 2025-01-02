<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-200 text-gray-800">

    <!-- Cabeçalho -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">Desafio Laravel</h1>
            <nav>
                <a href="/register" class="hover:text-gray-200 mx-2">Registrar</a>
                <a href="/login" class="hover:text-gray-200 mx-2">Login</a>
            </nav>
        </div>
    </header>

    <!-- Corpo -->
    <main class="container mx-auto px-4 py-12 text-center">
        <h2 class="text-4xl font-extrabold mb-4">Bem-vindo ao Desafio Laravel</h2>
        <p class="text-lg mb-6">Um projeto para mostrar minha habilidade em Laravel, para o teste.</p>
        <div class="space-x-4">
            <a href="/tarefas" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow transition">
                Acessar Tarefas
            </a>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Desafio Laravel. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
