<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen text-slate-800 antialiased">

    <!-- Navbar Admin -->
    <nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center shadow-lg">
        <h1 class="text-xl font-bold tracking-wide flex items-center gap-2">
            <span class="p-1.5 bg-indigo-600 rounded-lg text-sm">⚡</span> Dashboard Admin
        </h1>

        <form method="Get" action="{{ route('login.store') }}">
            @csrf

            <button type="submit"
                class="bg-indigo-700/60 backdrop-blur px-4 py-1.5 rounded-full text-sm font-medium border border-indigo-400/30 text-white hover:bg-indigo-700 transition">
                👤 {{ Auth::user()->name }}
            </button>
        </form>

    </nav>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto p-6 md:p-8 space-y-8">

        <!-- Header Section -->
        <div
            class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-slate-200/80 flex flex-col md:flex-row justify-between md:items-center gap-4">
            <div>
                <a href="" class="text-2xl md:text-3xl font-extrabold text-slate-900">
                    Bonjour Admin : <span class="text-indigo-600">{{ Auth::user()->name }}</span> 👋
                </a>
                <p class="text-slate-500 text-sm mt-1">
                    Voici un aperçu global des statistiques de votre plateforme.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('Evenement') }}"
                    class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-sm hover:shadow transition-all duration-200 text-sm">
                    ➕ Créer Event
                </a>
                <a href="{{ route('AfficherEvenement') }}"
                    class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-2.5 px-5 rounded-xl border border-slate-200 transition-all duration-200 text-sm">
                    👁️ Voir les événements
                </a>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card 1: Total Users -->
            <div class="bg-white shadow-sm hover:shadow-md rounded-2xl p-6 border border-slate-200/80 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Utilisateurs</h3>
                    <span class="p-2 bg-blue-50 text-blue-600 rounded-lg text-xs font-semibold">Total</span>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ App\Models\User::count() }}
                </p>
            </div>

            <!-- Card 2: Students -->
            <div class="bg-white shadow-sm hover:shadow-md rounded-2xl p-6 border border-slate-200/80 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Étudiants</h3>
                    <span class="p-2 bg-emerald-50 text-emerald-600 rounded-lg text-xs font-semibold">Rôle</span>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ App\Models\User::where('role_user', 'Etudiant')->count() }}
                </p>
            </div>

            <!-- Card 3: Admins -->
            <div class="bg-white shadow-sm hover:shadow-md rounded-2xl p-6 border border-slate-200/80 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Administrateurs</h3>
                    <span class="p-2 bg-purple-50 text-purple-600 rounded-lg text-xs font-semibold">Rôle</span>
                </div>
                <p class="text-3xl font-extrabold text-slate-900">
                    {{ App\Models\User::where('role_user', 'Admin')->count() }}
                </p>
            </div>

            <!-- Card 4: My Role -->
            <div class="bg-white shadow-sm hover:shadow-md rounded-2xl p-6 border border-slate-200/80 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Mon rôle</h3>
                    <span class="p-2 bg-amber-50 text-amber-600 rounded-lg text-xs font-semibold">Session</span>
                </div>
                <p class="text-xl font-bold text-indigo-600 capitalize">
                    {{ Auth::user()->role_user }}
                </p>
            </div>

        </div>

    </div>

</body>

</html>
