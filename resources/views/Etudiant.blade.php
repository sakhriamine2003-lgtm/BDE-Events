<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 min-h-screen text-slate-800 antialiased">

    <!-- Navbar moderne -->
    <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between items-center shadow-md">

        <h1 class="text-xl font-bold tracking-wide flex items-center gap-2">
            <span>🎓</span> Dashboard Étudiant
        </h1>

        <div
            class="bg-indigo-700/60 backdrop-blur px-4 py-1.5 rounded-full text-sm font-medium border border-indigo-400/30">
            👤 {{ Auth::user()->name }}
        </div>

    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto p-6 md:p-8 space-y-6">

        <!-- Card Profile Info -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 md:p-8">

            <div class="border-b border-slate-100 pb-4 mb-6">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900">
                    Bienvenue, <span class="text-indigo-600">{{ Auth::user()->name }}</span> ! 👋
                </h2>

                <p class="text-slate-500 mt-1">
                    Vous êtes connecté avec succès à votre espace.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Email</span>
                    <p class="font-medium text-slate-700">{{ Auth::user()->email }}</p>
                </div>

                <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Rôle</span>
                    <p class="font-medium text-indigo-600 uppercase tracking-wide text-sm">{{ Auth::user()->role_user }}
                    </p>
                </div>

            </div>

        </div>

        <!-- Buttons / Navigation Links -->
        <div class="flex flex-col sm:flex-row gap-4">

            <a href="{{ 'AfficherEvenement' }}"
                class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 px-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-200">
                Voir le dernier Événement
            </a>

            <a href="{{ 'AffTicket' }}"
                class="flex-1 text-center bg-white hover:bg-slate-50 text-slate-700 font-semibold py-3.5 px-6 rounded-xl border border-slate-200 shadow-sm hover:shadow transition-all duration-200">
                Tiket 🎉
            </a>

        </div>

    </div>

</body>

</html>
