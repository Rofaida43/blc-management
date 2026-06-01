<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLC Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen bg-gray-100">

    <!-- Sidebar gauche -->
    <aside class="w-64 bg-red-700 text-white flex-shrink-0 flex flex-col">
        <div class="p-6 font-bold text-xl border-b border-red-800">
            BLC 
        </div>
        <nav class="mt-4 flex-1 flex flex-col">
            <a href="{{ route('clients.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion clients</a>
            <a href="{{ route('produits.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion produits</a>
           <a href="{{ route('vols.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion vols</a>
           <a href="{{ route('repas.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion repas</a>
            <a href="{{ route('blcs.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion BLC</a>
            <a href="{{ route('users.index') }}" class="block px-6 py-3 hover:bg-red-800">Gestion utilisateurs</a>

        </nav>
    </aside>

    <!-- Contenu principal -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="flex justify-between items-center bg-red-700 text-white p-4 shadow">
            <div>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
</div>

            <div class="text-lg font-semibold">Bons de livraison catering</div>
            <div class="flex items-center space-x-4">
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white text-red-700 px-3 py-1 rounded hover:bg-gray-200">Logout</button>
                </form>
            </div>
        </header>

        <!-- Contenu dynamique -->
        <main class="flex-1 p-6 overflow-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>




